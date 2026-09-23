<?php

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use App\Services\ExcursionFieldMap;
use App\Services\ExcursionService;
use Subfission\Cas\Middleware\CASAuth;

beforeEach(function (): void {
    $this->year = SchoolYear::create([
        'sxoliko_etos' => '2026_2027',
        'is_current' => true,
    ]);

    $this->school = School::create([
        'school_year_id' => $this->year->id,
        'kodikos_sxoleiou' => '1901000',
        'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
        'displayname' => 'Γυμνάσιο Δοκιμής',
        'email' => 'school@example.com',
        'phonenumbers' => '2310000000',
    ]);

    $this->fieldMap = new ExcursionFieldMap;
});

it('passes field map to create view', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->get(route('excursion.create'));

    $response->assertStatus(200);
    $response->assertViewHas('fieldMap');
    $response->assertViewHas('types');
});

it('passes field map to edit view', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => 'Σχολικός Περίπατος',
        'proorismos' => 'Θεσσαλονίκη',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $response = $this->withoutMiddleware(CASAuth::class)
        ->get(route('excursion.edit', $excursion));

    $response->assertStatus(200);
    $response->assertViewHas('fieldMap');
    $response->assertSee('data-unsaved-changes-form');
    $response->assertSee('data-unsaved-changes-link');
});

it('resolves a Blade component for every excursion form type', function (): void {
    $service = app(ExcursionService::class);

    foreach ($service->getExcursionTypes() as $type => $definition) {
        $excursion = new Excursion(['eidos_ekdromis' => $type]);
        $component = $service->formComponent($excursion);

        $this->assertNotSame('', $component, $type);
        $this->assertTrue(view()->exists('components.'.$component), $type);
    }
});

it('creates excursion with peripatos type fields', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['school' => $this->school])
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'peripatos',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'ar_prajis_syllogou' => '123/2026',
            'a_arithmos' => '1',
            'metaforika_mesa' => 'Πεζή',
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('excursions', [
        'eidos_ekdromis' => 'Σχολικός Περίπατος',
        'proorismos' => 'Θεσσαλονίκη',
        'ar_prajis_syllogou' => '123/2026',
    ]);
});

it('validates required fields for peripatos type', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'peripatos',
        ]);

    $response->assertSessionHasErrors(['proorismos', 'hmera_ekdromis_anaxorisis', 'ar_prajis_syllogou', 'a_arithmos']);
});

it('preserves submitted create values after validation fails', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->from(route('excursion.create', ['excursionType' => 'peripatos', 'informed' => true]))
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'peripatos',
            'proorismos' => 'Νέος Προορισμός',
            'hmera_ekdromis_anaxorisis' => 'not-a-date',
            'ar_prajis_syllogou' => '123/2026',
            'a_arithmos' => '1',
        ]);

    $response->assertSessionHasErrors('hmera_ekdromis_anaxorisis');
    $response->assertSessionHasInput('proorismos', 'Νέος Προορισμός');
});

it('validates required fields for hmerisiaxoris type', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'hmerisiaxoris',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
        ]);

    $response->assertSessionHasErrors(['ar_prajis_syllogou', 'a_arithmos', 'ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi']);
});

it('validates required fields for ekp_exotiko type', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'ekp_exotiko',
            'proorismos' => 'Βερολίνο',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
        ]);

    $response->assertSessionHasErrors([
        'ar_prajis_syllogou', 'a_arithmos', 'ar_metakinoumenon', 'plithos_synodoi',
    ]);
});

it('validates required fields for erasmus2 type', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'erasmus2',
            'proorismos' => 'Βερολίνο',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
        ]);

    $response->assertSessionHasErrors(['plithos_synodoi']);
});

it('rejects invalid excursion type', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'invalid_type',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
        ]);

    $response->assertSessionHasErrors(['eidos_ekdromis']);
});

it('updates excursion with type-specific validation', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => 'Σχολικός Περίπατος',
        'proorismos' => 'Θεσσαλονίκη',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'ar_prajis_syllogou' => '123/2026',
        'a_arithmos' => '1',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $response = $this->withoutMiddleware(CASAuth::class)
        ->put(route('excursion.update', $excursion), [
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'proorismos' => 'Λαγκαδάς',
            'hmera_ekdromis_anaxorisis' => '2026-11-10',
            'ar_prajis_syllogou' => '456/2026',
            'a_arithmos' => '2',
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('excursions', [
        'id' => $excursion->id,
        'proorismos' => 'Λαγκαδάς',
        'ar_prajis_syllogou' => '456/2026',
    ]);
});

it('preserves submitted edit values after validation fails', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => 'Σχολικός Περίπατος',
        'proorismos' => 'Θεσσαλονίκη',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'ar_prajis_syllogou' => '123/2026',
        'a_arithmos' => '1',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $response = $this->withoutMiddleware(CASAuth::class)
        ->put(route('excursion.update', $excursion), [
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'proorismos' => 'Προσωρινός Προορισμός',
            'hmera_ekdromis_anaxorisis' => 'not-a-date',
            'ar_prajis_syllogou' => '456/2026',
            'a_arithmos' => '2',
        ]);

    $response->assertSessionHasErrors('hmera_ekdromis_anaxorisis');
    $response->assertSessionHasInput('proorismos', 'Προσωρινός Προορισμός');
});

it('validates date fields for multi-day types', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['school' => $this->school])
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'pollesesjot',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'ar_prajis_syllogou' => '123/2026',
            'a_arithmos' => '1',
            'ar_metakinoumenon' => '20',
            'plithos_synodoi' => '2',
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('excursions', [
        'eidos_ekdromis' => 'Πολλήμερη Εκδρομή εκτός Τόπου Εκπαίδευσης',
    ]);
});

it('validates erasmus-specific fields for erasmus2', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['school' => $this->school])
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'erasmus2',
            'proorismos' => 'Βερολίνο',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'plithos_synodoi' => '2',
            'ar_prajis_syllogou' => '100/2026',
            'a_arithmos' => '1',
            'erasmus_ar_simbasis' => '2024-1-GR01-KA2',
            'erasmus_lista_kathig_kaieidikotita' => 'Παπαδόπουλος Γιάννης ΠΛΗΡ',
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('excursions', [
        'eidos_ekdromis' => 'Erasmus+ ΚΑ2',
        'erasmus_ar_simbasis' => '2024-1-GR01-KA2',
    ]);
});

it('finds type key from display name for edit', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => 'Σχολικός Περίπατος',
        'proorismos' => 'Θεσσαλονίκη',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'ar_prajis_syllogou' => '123/2026',
        'a_arithmos' => '1',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $response = $this->withoutMiddleware(CASAuth::class)
        ->put(route('excursion.update', $excursion), [
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'proorismos' => 'Νέος Προορισμός',
            'hmera_ekdromis_anaxorisis' => '2026-12-01',
            'ar_prajis_syllogou' => '789/2026',
            'a_arithmos' => '3',
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('excursions', [
        'id' => $excursion->id,
        'proorismos' => 'Νέος Προορισμός',
    ]);
});

it('allows empty optional fields for peripatos', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['school' => $this->school])
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'peripatos',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'ar_prajis_syllogou' => '123/2026',
            'a_arithmos' => '1',
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('excursions', [
        'eidos_ekdromis' => 'Σχολικός Περίπατος',
    ]);
});

it('allows empty optional fields for programma_esoteriko', function (): void {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['school' => $this->school])
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'programma_esoteriko',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'ar_prajis_syllogou' => '123/2026',
            'a_arithmos' => '1',
            'ar_metakinoumenon' => '20',
            'plithos_synodoi' => '2',
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('excursions', [
        'eidos_ekdromis' => 'Εκπαιδευτική Επίσκεψη μέσω Προγράμματος Εσωτερικού',
    ]);
});
