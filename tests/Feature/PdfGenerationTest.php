<?php

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use App\Services\PdfService;
use Illuminate\Support\Facades\Storage;

dataset('excursion_types', [
    'Σχολικός Περίπατος' => ['Σχολικός Περίπατος', 1],
    'Ημερήσια δίχως διανυκτέρευση' => ['Ημερήσια δίχως διανυκτέρευση', 1],
    'Πολυήμερη εσωτερικό' => ['Πολυήμερη τελευταίας τάξης στο εσωτερικό', 1],
    'Πολυήμερη εξωτερικό' => ['Πολυήμερη τελευταίας τάξης στο εξωτερικό', 2],
    'Εκπαιδ. επίσκεψη προγράμματος εσωτ.' => ['Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό', 1],
    'Εκπαιδ. επισκέψεις εξωτ. προγράμματα' => ['Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων', 2],
    'Εκπαιδ. εκδρομή εσωτερικό' => ['Εκπαιδευτική εκδρομή στο εσωτερικό', 1],
    'Εκπαιδ. εκδρομή εξωτερικό' => ['Εκπαιδευτική εκδρομή στο εξωτερικό', 2],
    'Διδακτική επίσκεψη' => ['Διδακτική επίσκεψη', 1],
    'Επίσκεψη στη Βουλή' => ['Επίσκεψη στη Βουλή των Ελλήνων', 1],
    'Συμμετοχή διαγωνισμοί' => ['Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού', 1],
    'Ευρωπαϊκά προγράμματα' => ['Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό', 2],
    'ERASMUS+ΚΑ2' => ['Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2', 2],
    'ERASMUS+ΚΑ1' => ['Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1', 2],
]);

beforeEach(function (): void {
    if (! env('PERSIST_PDF_TEST')) {
        Storage::fake('local');
    }

    $this->year = SchoolYear::create([
        'sxoliko_etos' => '2025_2026',
        'is_current' => true,
    ]);

    $this->school = School::create([
        'school_year_id' => $this->year->id,
        'kodikos_sxoleiou' => '1901000',
        'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
        'displayname' => 'Γυμνάσιο Δοκιμής',
        'phonenumbers' => '2310000000',
        'email' => 'school@example.com',
    ]);
});

function persistPdfs(array $files, string $storagePath, string $testName): void
{
    if (! env('PERSIST_PDF_TEST') || empty($files)) {
        return;
    }

    $destDir = base_path('tests/PdfOutput/'.$testName);
    @mkdir($destDir, 0755, true);

    foreach ($files as $filename) {
        $source = Storage::disk('local')->path($storagePath.'/'.$filename);
        if (file_exists($source)) {
            copy($source, $destDir.'/'.$filename);
        }
    }
}

it('generates correct PDFs for excursion type: {0}', function (string $type, int $expectedFiles): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'eidos_ekdromis' => $type,
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
        'proorismos' => 'Θεσσαλονίκη',
        'hmera_ekdromis_anaxorisis' => '2026-11-05',
        'hmera_epistrofis' => '2026-11-05',
        'ora_anaxorisis' => '08:00:00',
        'ora_epistrofis' => '14:00:00',
        'ar_mathiton' => 20,
        'onoma_arxigos' => 'Γιάννης Παπαδόπουλος',
        'ar_prajis_syllogou' => '123/2026',
        'onoma_ypografonta' => 'Νικόλαος Αλεξίου',
        'prosfonisi_ypografonta' => 'Διευθυντής',
        'ar_prot_sxoleiou' => '100/2026',
        'hmera_diavivastikou' => '2026-10-01',
        'metaforika_mesa' => 'Πεζή',
    ])->refresh();

    $storagePath = 'arxeia/'.$this->year->sxoliko_etos.'/'.$this->school->kodikos_sxoleiou;

    $service = new PdfService;
    $files = $service->generateExcursionFiles($excursion);

    persistPdfs($files, $storagePath, "excursion_{$excursion->id}");

    expect($files)->toHaveCount($expectedFiles);

    foreach ($files as $filename) {
        Storage::disk('local')->assertExists($storagePath.'/'.$filename);
    }

    if ($expectedFiles === 1) {
        expect($files[0])->toBe($excursion->id.'F_Διαβιβαστικό.pdf');
    } else {
        expect($files[0])->toBe($excursion->id.'F_Διαβιβαστικό.pdf');
        expect($files[1])->toBe($excursion->id.'A_Αίτηση.pdf');
    }
})->with('excursion_types');

it('throws exception for unknown excursion type', function (): void {
    $excursion = Excursion::create([
        'school_year_id' => $this->year->id,
        'school_id' => $this->school->id,
        'eidos_ekdromis' => 'Άγνωστος Τύπος',
        'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
        'proorismos' => 'Αθήνα',
        'hmera_ekdromis_anaxorisis' => '2026-12-01',
        'hmera_epistrofis' => '2026-12-01',
        'ora_anaxorisis' => '08:00:00',
        'ora_epistrofis' => '18:00:00',
        'ar_mathiton' => 15,
        'onoma_arxigos' => 'Μαρία Κωνσταντίνου',
        'ar_prajis_syllogou' => '456/2026',
        'onoma_ypografonta' => 'Πέτρος Γεωργίου',
        'prosfonisi_ypografonta' => 'Διευθυντής',
        'ar_prot_sxoleiou' => '200/2026',
        'hmera_diavivastikou' => '2026-11-15',
    ]);

    (new PdfService)->generateExcursionFiles($excursion);
})->throws(Exception::class, "Δε δημιουργήθηκε διαβιβαστικό γιατί δε βρέθηκε το είδος της εκδρομής 'Άγνωστος Τύπος'");
