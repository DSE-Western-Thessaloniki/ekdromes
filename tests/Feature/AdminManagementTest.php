<?php

namespace Tests\Feature;

use App\Http\Middleware\EnsureCasAccountHasAccess;
use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Subfission\Cas\Middleware\CASAuth;
use Tests\TestCase;

class AdminManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_school_account_cannot_access_admin_management(): void
    {
        $response = $this->withoutMiddleware([CASAuth::class, EnsureCasAccountHasAccess::class])
            ->withSession(['cas_model_category' => 'school'])
            ->get(route('admin.users.index'));

        $response->assertForbidden();
    }

    public function test_admin_can_view_user_management(): void
    {
        $this->createSchoolYear('2026_2027', true);
        $name = '<script>alert(1)</script>';
        $this->createAdmin('admin@sch.gr', $name);

        $response = $this->asAdmin()->withoutVite()->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertSee('Προσθήκη διαχειριστή ΠΣΔ');
        $response->assertSee('admin@sch.gr');
        $response->assertSee('name="email_username"', false);
        $response->assertSee('@sch.gr');
        $this->assertStringContainsString('&lt;script&gt;alert(1)&lt;/script&gt;', $response->getContent());
        $this->assertStringNotContainsString($name, $response->getContent());
    }

    public function test_admin_can_add_another_admin_with_name_and_email(): void
    {
        $this->createAdmin();

        $response = $this->asAdmin()->post(route('admin.users.store'), [
            'name' => 'Νέος Διαχειριστής',
            'email_username' => 'new-admin',
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', [
            'name' => 'Νέος Διαχειριστής',
            'email' => 'new-admin@sch.gr',
            'active' => 1,
        ]);
    }

    public function test_admin_email_username_cannot_include_a_domain(): void
    {
        $this->createAdmin();

        $response = $this->asAdmin()->post(route('admin.users.store'), [
            'name' => 'Νέος Διαχειριστής',
            'email_username' => 'new-admin@sch.gr',
        ]);

        $response->assertSessionHasErrors('email_username');
        $this->assertDatabaseCount('users', 1);
    }

    public function test_admin_email_must_be_unique(): void
    {
        $this->createAdmin('existing@sch.gr');

        $response = $this->asAdmin()->post(route('admin.users.store'), [
            'name' => 'Διπλός Διαχειριστής',
            'email_username' => 'existing',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('users', 1);
    }

    public function test_last_admin_cannot_be_deleted(): void
    {
        $admin = $this->createAdmin();

        $response = $this->asAdmin()->delete(route('admin.users.destroy', $admin));

        $response->assertRedirect(route('admin.users.index'));
        $response->assertSessionHas('error');
        $this->assertModelExists($admin);
    }

    public function test_admin_can_delete_a_user_when_another_admin_remains(): void
    {
        $this->createAdmin();
        $admin = $this->createAdmin('second-admin@sch.gr');

        $response = $this->asAdmin()->delete(route('admin.users.destroy', $admin));

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseMissing('users', ['id' => $admin->id]);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_admin_can_add_a_school_to_the_current_school_year(): void
    {
        $year = $this->createSchoolYear('2026_2027', true);

        $response = $this->asAdmin()->post(route('admin.schools.store'), [
            'kodikos_sxoleiou' => '1901000',
            'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
            'displayname' => 'Γυμνάσιο Θεσσαλονίκης',
            'phonenumbers' => '2310000000',
            'email' => 'school@sch.gr',
        ]);

        $response->assertRedirect(route('admin.schools'));
        $this->assertDatabaseHas('schools', [
            'school_year_id' => $year->id,
            'kodikos_sxoleiou' => '1901000',
            'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
            'displayname' => 'Γυμνάσιο Θεσσαλονίκης',
            'phonenumbers' => '2310000000',
            'email' => 'school@sch.gr',
        ]);
    }

    public function test_admin_can_view_school_management(): void
    {
        $year = $this->createSchoolYear('2026_2027', true);
        $name = '<script>alert(1)</script>';
        $this->createSchool($year, '1901000', $name);

        $response = $this->asAdmin()->withoutVite()->get(route('admin.schools'));

        $response->assertOk();
        $response->assertSee('Προσθήκη σχολικής μονάδας');
        $response->assertSee('Αντιγραφή σχολικών μονάδων σε άλλο έτος');
        $this->assertStringContainsString('&lt;script&gt;alert(1)&lt;/script&gt;', $response->getContent());
        $this->assertStringNotContainsString($name, $response->getContent());
    }

    public function test_school_code_must_be_unique_within_the_current_school_year(): void
    {
        $year = $this->createSchoolYear('2026_2027', true);
        $this->createSchool($year, '1901000', 'Υπάρχουσα μονάδα');

        $response = $this->asAdmin()->post(route('admin.schools.store'), [
            'kodikos_sxoleiou' => '1901000',
            'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
            'displayname' => 'Διπλή μονάδα',
        ]);

        $response->assertSessionHasErrors('kodikos_sxoleiou');
        $this->assertDatabaseCount('schools', 1);
    }

    public function test_school_copy_adds_missing_schools_and_preserves_existing_ones(): void
    {
        $sourceYear = $this->createSchoolYear('2025_2026');
        $targetYear = $this->createSchoolYear('2026_2027', true);
        $this->createSchool($sourceYear, '1901000', 'Γυμνάσιο Α');
        $this->createSchool($sourceYear, '1901001', 'Λύκειο Β', 'ΛΥΚΕΙΟ');
        $this->createSchool($targetYear, '1901000', 'Υφιστάμενη επωνυμία');

        $response = $this->asAdmin()->post(route('admin.schools.copy'), [
            'source_school_year_id' => $sourceYear->id,
            'target_school_year_id' => $targetYear->id,
        ]);

        $response->assertRedirect(route('admin.schools'));
        $this->assertDatabaseCount('schools', 4);
        $this->assertDatabaseHas('schools', [
            'school_year_id' => $targetYear->id,
            'kodikos_sxoleiou' => '1901000',
            'displayname' => 'Υφιστάμενη επωνυμία',
        ]);
        $this->assertDatabaseHas('schools', [
            'school_year_id' => $targetYear->id,
            'kodikos_sxoleiou' => '1901001',
            'displayname' => 'Λύκειο Β',
            'typos_sxoleiou' => 'ΛΥΚΕΙΟ',
        ]);
    }

    public function test_school_copy_rejects_the_same_source_and_target_year(): void
    {
        $year = $this->createSchoolYear('2026_2027', true);

        $response = $this->asAdmin()->post(route('admin.schools.copy'), [
            'source_school_year_id' => $year->id,
            'target_school_year_id' => $year->id,
        ]);

        $response->assertSessionHasErrors('source_school_year_id');
        $this->assertDatabaseCount('schools', 0);
    }

    public function test_admin_can_delete_a_current_year_school_without_excursions(): void
    {
        $year = $this->createSchoolYear('2026_2027', true);
        $school = $this->createSchool($year, '1901000', 'Γυμνάσιο Α');

        $response = $this->asAdmin()->delete(route('admin.schools.destroy', $school));

        $response->assertRedirect(route('admin.schools'));
        $this->assertDatabaseMissing('schools', ['id' => $school->id]);
    }

    public function test_admin_cannot_delete_a_school_with_a_current_year_excursion(): void
    {
        $year = $this->createSchoolYear('2026_2027', true);
        $school = $this->createSchool($year, '1901000', 'Γυμνάσιο Α');
        Excursion::create([
            'school_year_id' => $year->id,
            'school_id' => $school->id,
            'kodikos_sxoleiou' => $school->kodikos_sxoleiou,
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
        ]);

        $response = $this->asAdmin()->delete(route('admin.schools.destroy', $school));

        $response->assertRedirect(route('admin.schools'));
        $response->assertSessionHas('error');
        $this->assertModelExists($school);
        $this->assertDatabaseCount('excursions', 1);
    }

    private function asAdmin(): static
    {
        return $this->withoutMiddleware([CASAuth::class, EnsureCasAccountHasAccess::class])
            ->withSession(['cas_model_category' => 'user']);
    }

    private function createSchoolYear(string $name, bool $isCurrent = false): SchoolYear
    {
        return SchoolYear::create([
            'sxoliko_etos' => $name,
            'is_current' => $isCurrent,
        ]);
    }

    private function createAdmin(string $email = 'admin@sch.gr', string $name = 'Διαχειριστής'): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'active' => true,
        ]);
    }

    private function createSchool(
        SchoolYear $year,
        string $code,
        string $name,
        string $type = 'ΓΥΜΝΑΣΙΟ'
    ): School {
        return School::create([
            'school_year_id' => $year->id,
            'kodikos_sxoleiou' => $code,
            'typos_sxoleiou' => $type,
            'displayname' => $name,
        ]);
    }
}
