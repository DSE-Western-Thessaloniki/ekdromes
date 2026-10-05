<?php

use App\Http\Middleware\EnsureCasAccountHasAccess;
use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use App\Services\ExcursionService;
use Illuminate\Support\Facades\Storage;
use Subfission\Cas\Middleware\CASAuth;

beforeEach(function (): void {
    Storage::fake('local');

    $this->withoutMiddleware([CASAuth::class, EnsureCasAccountHasAccess::class]);

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
});

function article11GroupedPayload(array $overrides = []): array
{
    return array_merge([
        'eidos_ekdromis' => ExcursionService::ARTICLE_11_GENERAL_TITLE,
        'proorismos' => 'Βρυξέλλες',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'hmera_epistrofis' => '2026-11-08',
        'ar_metakinoumenon' => 20,
        'plithos_synodoi' => 2,
        'eideis_arthrou_11' => ['Αδελφοποιήσεων', 'Προγραμμάτων διεθνών οργανισμών'],
    ], $overrides);
}

it('offers only the general article 11 title in the excursion type list', function (): void {
    $response = $this->withSession(['school' => $this->school])
        ->get(route('excursion.create', ['IKnowWhatIAmDoing' => true]));

    $response->assertOk();
    $response->assertSee(ExcursionService::ARTICLE_11_GENERAL_TITLE);
    $response->assertDontSee('Αδελφοποιήσεων');
    $response->assertDontSee('Προγραμμάτων διεθνών οργανισμών');
});

it('redirects to the type list when a legacy article 11 type is requested', function (): void {
    $response = $this->withSession(['school' => $this->school])
        ->get(route('excursion.create', ['excursionType' => 'Αδελφοποιήσεων']));

    $response->assertRedirect(route('excursion.create'));
});

it('renders one checkbox per article 11 title on the grouped form', function (): void {
    $response = $this->withSession(['school' => $this->school])
        ->get(route('excursion.create', [
            'excursionType' => ExcursionService::ARTICLE_11_GENERAL_TITLE,
            'informed' => true,
        ]));

    $response->assertOk();
    $response->assertSee('name="eideis_arthrou_11[]"', false);
    expect(substr_count($response->getContent(), 'name="eideis_arthrou_11[]"'))
        ->toBe(count(ExcursionService::ARTICLE_11_TYPES));
});

it('renders the article 11 guidelines for the grouped type', function (): void {
    $response = $this->withSession(['school' => $this->school])
        ->get(route('excursion.create', ['excursionType' => ExcursionService::ARTICLE_11_GENERAL_TITLE]));

    $response->assertOk();
    $response->assertSee('διασχολικής ομάδας');
});

it('stores the article 11 titles selected for the grouped type', function (): void {
    $response = $this->withSession(['school' => $this->school])
        ->post(route('excursion.store'), article11GroupedPayload());

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();

    $excursion = Excursion::sole();
    expect($excursion->eidos_ekdromis)->toBe(ExcursionService::ARTICLE_11_GENERAL_TITLE)
        ->and($excursion->eideis_arthrou_11)
        ->toBe(['Αδελφοποιήσεων', 'Προγραμμάτων διεθνών οργανισμών']);
});

it('requires at least one article 11 title for the grouped type', function (): void {
    $payload = article11GroupedPayload();
    unset($payload['eideis_arthrou_11']);

    $response = $this->withSession(['school' => $this->school])
        ->post(route('excursion.store'), $payload);

    $response->assertSessionHasErrors('eideis_arthrou_11');
    expect(Excursion::count())->toBe(0);
});

it('rejects an article 11 title outside the predefined list', function (): void {
    $response = $this->withSession(['school' => $this->school])
        ->post(route('excursion.store'), article11GroupedPayload([
            'eideis_arthrou_11' => ['Τίτλος που δεν υπάρχει'],
        ]));

    $response->assertSessionHasErrors('eideis_arthrou_11.0');
    expect(Excursion::count())->toBe(0);
});

it('does not require article 11 titles for other excursion types', function (): void {
    $response = $this->withSession(['school' => $this->school])
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'ar_prajis_syllogou' => '123/2026',
            'a_arithmos' => '1',
        ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
    expect(Excursion::sole()->eideis_arthrou_11)->toBeNull();
});

it('rejects storing a legacy article 11 type', function (): void {
    $response = $this->withSession(['school' => $this->school])
        ->post(route('excursion.store'), [
            'eidos_ekdromis' => 'Αδελφοποιήσεων',
            'proorismos' => 'Βιέννη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
        ]);

    $response->assertSessionHasErrors('eidos_ekdromis');
    expect(Excursion::count())->toBe(0);
});

it('keeps an existing legacy article 11 excursion editable', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => 'Αδελφοποιήσεων',
        'proorismos' => 'Βιέννη',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $response = $this->withSession(['school' => $this->school])
        ->put(route('excursion.update', $excursion), [
            'eidos_ekdromis' => 'Αδελφοποιήσεων',
            'proorismos' => 'Άμστερνταμ',
            'hmera_ekdromis_anaxorisis' => '2026-11-10',
        ]);

    $response->assertRedirect();
    expect($excursion->fresh()->proorismos)->toBe('Άμστερνταμ');
});

it('lists the selected article 11 titles in the europ application view', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => ExcursionService::ARTICLE_11_GENERAL_TITLE,
        'eideis_arthrou_11' => ['Αδελφοποιήσεων', 'Προγραμμάτων διεθνών οργανισμών'],
        'proorismos' => 'Βρυξέλλες',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $html = view('pdf.europ.application', ['excursion' => $excursion->load('school')])->render();

    expect($html)
        ->toContain(ExcursionService::ARTICLE_11_GENERAL_TITLE)
        ->toContain('Συγκεκριμένες περιπτώσεις:')
        ->toContain('Αδελφοποιήσεων')
        ->toContain('Προγραμμάτων διεθνών οργανισμών');
});

it('keeps the stored article 11 titles checked on the edit form', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => ExcursionService::ARTICLE_11_GENERAL_TITLE,
        'eideis_arthrou_11' => ['Αδελφοποιήσεων', 'Προγραμμάτων διεθνών οργανισμών'],
        'proorismos' => 'Βρυξέλλες',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $response = $this->withSession(['school' => $this->school])
        ->get(route('excursion.edit', $excursion));

    $response->assertOk();

    $html = $response->getContent();
    expect($html)->toContain('name="eideis_arthrou_11[]"')
        ->and(preg_match('/value="Αδελφοποιήσεων"\s+checked/', $html))->toBe(1)
        ->and(preg_match('/value="Προγραμμάτων διεθνών οργανισμών"\s+checked/', $html))->toBe(1)
        ->and(preg_match('/value="Πιλοτικών προγραμμάτων[^"]*"\s+checked/', $html))->toBe(0);
});

it('requires an article 11 title when updating a grouped excursion', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => ExcursionService::ARTICLE_11_GENERAL_TITLE,
        'eideis_arthrou_11' => ['Αδελφοποιήσεων'],
        'proorismos' => 'Βρυξέλλες',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $response = $this->withSession(['school' => $this->school])
        ->put(route('excursion.update', $excursion), [
            'eidos_ekdromis' => ExcursionService::ARTICLE_11_GENERAL_TITLE,
            'proorismos' => 'Άμστερνταμ',
            'hmera_ekdromis_anaxorisis' => '2026-11-10',
        ]);

    $response->assertSessionHasErrors('eideis_arthrou_11');
    expect($excursion->fresh()->proorismos)->toBe('Βρυξέλλες');
});

it('updates the selected article 11 titles', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
        'eidos_ekdromis' => ExcursionService::ARTICLE_11_GENERAL_TITLE,
        'eideis_arthrou_11' => ['Αδελφοποιήσεων'],
        'proorismos' => 'Βρυξέλλες',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
    ]);

    $response = $this->withSession(['school' => $this->school])
        ->put(route('excursion.update', $excursion), [
            'eidos_ekdromis' => ExcursionService::ARTICLE_11_GENERAL_TITLE,
            'proorismos' => 'Άμστερνταμ',
            'hmera_ekdromis_anaxorisis' => '2026-11-10',
            'eideis_arthrou_11' => ['Προγραμμάτων διεθνών οργανισμών'],
        ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
    expect($excursion->fresh()->eideis_arthrou_11)->toBe(['Προγραμμάτων διεθνών οργανισμών']);
});
