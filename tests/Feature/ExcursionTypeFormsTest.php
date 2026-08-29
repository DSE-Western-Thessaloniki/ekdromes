<?php

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use App\Services\ExcursionFieldMap;
use Subfission\Cas\Middleware\CASAuth;

beforeEach(function () {
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

it('passes field map to create view', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->get(route('excursion.create'));

    $response->assertStatus(200);
    $response->assertViewHas('fieldMap');
    $response->assertViewHas('types');
});

it('passes field map to edit view', function () {
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
});

it('creates excursion with peripatos type fields', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['cas_school' => $this->school])
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

it('validates required fields for peripatos type', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'peripatos',
        ]);

    $response->assertSessionHasErrors(['proorismos', 'hmera_ekdromis_anaxorisis', 'ar_prajis_syllogou', 'a_arithmos']);
});

it('validates required fields for hmerisiaxoris type', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'hmerisiaxoris',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
        ]);

    $response->assertSessionHasErrors(['ar_prajis_syllogou', 'a_arithmos', 'ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi']);
});

it('validates required fields for ekp_exotiko type', function () {
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

it('validates required fields for erasmus2 type', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'erasmus2',
            'proorismos' => 'Βερολίνο',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
        ]);

    $response->assertSessionHasErrors(['plithos_synodoi']);
});

it('rejects invalid excursion type', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'invalid_type',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
        ]);

    $response->assertSessionHasErrors(['eidos_ekdromis']);
});

it('updates excursion with type-specific validation', function () {
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

it('validates date fields for multi-day types', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['cas_school' => $this->school])
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

it('validates erasmus-specific fields for erasmus2', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['cas_school' => $this->school])
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

it('finds type key from display name for edit', function () {
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

it('allows empty optional fields for peripatos', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['cas_school' => $this->school])
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

it('allows empty optional fields for programma_esoteriko', function () {
    $response = $this->withoutMiddleware(CASAuth::class)
        ->withSession(['cas_school' => $this->school])
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
