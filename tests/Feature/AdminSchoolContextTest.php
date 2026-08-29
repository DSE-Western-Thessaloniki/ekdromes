<?php

namespace Tests\Feature;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AdminSchoolContextTest extends TestCase
{
    use RefreshDatabase;

    protected SchoolYear $year;

    protected School $school1;

    protected School $school2;

    protected Excursion $excursion1;

    protected Excursion $excursion2;

    protected function setUp(): void
    {
        parent::setUp();

        // Create test data
        $this->year = SchoolYear::create([
            'sxoliko_etos' => '2026_2027',
            'is_current' => true,
        ]);

        $this->school1 = School::create([
            'school_year_id' => $this->year->id,
            'kodikos_sxoleiou' => '1901000',
            'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
            'displayname' => 'Γυμνάσιο Θεσσαλονίκης 1',
            'email' => 'school1@example.com',
            'phonenumbers' => '2310000001',
        ]);

        $this->school2 = School::create([
            'school_year_id' => $this->year->id,
            'kodikos_sxoleiou' => '1901001',
            'typos_sxoleiou' => 'ΛΥΚΕΙΟ',
            'displayname' => 'Λύκειο Θεσσαλονίκης 1',
            'email' => 'school2@example.com',
            'phonenumbers' => '2310000002',
        ]);

        $this->excursion1 = Excursion::create([
            'school_year_id' => $this->year->id,
            'school_id' => $this->school1->id,
            'kodikos_sxoleiou' => $this->school1->kodikos_sxoleiou,
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'hmera_epistrofis' => '2026-11-05',
            'ora_anaxorisis' => '08:00:00',
            'ora_epistrofis' => '14:00:00',
            'ar_mathiton' => 20,
            'onoma_arxigos' => 'Γιάννης Παπαδόπουλος',
            'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
        ]);

        $this->excursion2 = Excursion::create([
            'school_year_id' => $this->year->id,
            'school_id' => $this->school2->id,
            'kodikos_sxoleiou' => $this->school2->kodikos_sxoleiou,
            'eidos_ekdromis' => 'Ημερήσια εκδρομή',
            'proorismos' => 'Αθήνα',
            'hmera_ekdromis_anaxorisis' => '2026-12-01',
            'hmera_epistrofis' => '2026-12-01',
            'ora_anaxorisis' => '07:00:00',
            'ora_epistrofis' => '19:00:00',
            'ar_mathiton' => 30,
            'onoma_arxigos' => 'Μαρία Νικολάου',
            'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
        ]);
    }

    public function test_admin_can_access_dashboard(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => true])
            ->get(route('admin.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.index');
        $response->assertViewHas('allExcursions');
        $response->assertViewHas('currentYear');
    }

    public function test_non_admin_cannot_access_admin_dashboard(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => false])
            ->get(route('admin.index'));

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
    }

    public function test_admin_can_select_school(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => true])
            ->post(route('admin.select-school'), [
                'school_code' => $this->school1->kodikos_sxoleiou,
            ]);

        $response->assertRedirect(route('admin.index'));
        $response->assertSessionHas('admin_selected_school', $this->school1->kodikos_sxoleiou);
    }

    public function test_admin_cannot_select_nonexistent_school(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => true])
            ->post(route('admin.select-school'), [
                'school_code' => 'NONEXISTENT',
            ]);

        $response->assertRedirect(route('admin.index'));
        $response->assertSessionHas('errors');
    }

    public function test_admin_can_clear_school_selection(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => true, 'admin_selected_school' => $this->school1->kodikos_sxoleiou])
            ->post(route('admin.clear-school'));

        $response->assertRedirect(route('admin.index'));
        $this->assertNull(Session::get('admin_selected_school'));
    }

    public function test_admin_can_view_excursions_by_school(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => true])
            ->get(route('admin.excursions-by-school', $this->school1->kodikos_sxoleiou));

        $response->assertStatus(200);
        $response->assertViewIs('admin.excursions-by-school');
        $response->assertViewHas('school', $this->school1);
        $response->assertViewHas('excursions');
    }

    public function test_admin_can_only_see_selected_school_excursions(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => true])
            ->get(route('admin.excursions-by-school', $this->school1->kodikos_sxoleiou));

        $excursions = $response->viewData('excursions');
        $this->assertCount(1, $excursions);
        $this->assertEquals($this->excursion1->id, $excursions->first()->id);
    }

    public function test_admin_dashboard_shows_all_excursions_grouped_by_school(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => true])
            ->get(route('admin.index'));

        $allExcursions = $response->viewData('allExcursions');
        $this->assertCount(2, $allExcursions);
    }

    public function test_admin_dashboard_displays_school_info_in_table(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => true])
            ->get(route('admin.index'));

        $response->assertSee($this->school1->displayname);
        $response->assertSee($this->school2->displayname);
        $response->assertSee($this->excursion1->eidos_ekdromis);
        $response->assertSee($this->excursion2->eidos_ekdromis);
    }

    public function test_admin_selected_school_info_displays_in_dashboard(): void
    {
        $response = $this->withoutMiddleware()
            ->session([
                'cas_is_admin' => true,
                'admin_selected_school' => $this->school1->kodikos_sxoleiou,
            ])
            ->get(route('admin.index'));

        $selectedSchool = $response->viewData('selectedSchool');
        $this->assertNotNull($selectedSchool);
        $this->assertEquals($this->school1->id, $selectedSchool->id);
    }

    public function test_non_admin_cannot_select_school(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => false])
            ->post(route('admin.select-school'), [
                'school_code' => $this->school1->kodikos_sxoleiou,
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
    }

    public function test_non_admin_cannot_view_excursions_by_school(): void
    {
        $response = $this->withoutMiddleware()
            ->session(['cas_is_admin' => false])
            ->get(route('admin.excursions-by-school', $this->school1->kodikos_sxoleiou));

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
    }
}
