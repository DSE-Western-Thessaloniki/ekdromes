<?php

namespace App\Services;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ExcursionService
{
    /**
     * @var SchoolYear|null
     */
    public $currentYear;

    public function __construct(?SchoolYear $currentYear = null)
    {
        $this->currentYear = $currentYear ?? SchoolYear::getSessionCurrent();
    }

    public function getCurrentYear(): SchoolYear
    {
        return $this->currentYear;
    }

    /**
     * @return array<string, array<string, string|int|string[]>>
     */
    public function getExcursionTypes(): array
    {
        return [
            'Σχολικός Περίπατος' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 1,
                'legislation' => 'Άρθρο 1 Υ.Α. 20883/ΓΔ4/12-2-2020 (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/peripatos/'),
            ],
            'Ημερήσια δίχως διανυκτέρευση' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 1,
                'legislation' => 'Άρθρο 2, § 1,2,3,4 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/hmerisiaxoris/'),
            ],
            'Πολυήμερη τελευταίας τάξης στο εσωτερικό' => [
                'category' => '',
                'school_types' => ['ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 1,
                'legislation' => 'Άρθρο 2 § 5 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/pollesesot/'),
            ],
            'Πολυήμερη τελευταίας τάξης στο εξωτερικό' => [
                'category' => '',
                'school_types' => ['ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 3,
                'legislation' => 'Άρθρο 2 § 5 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/pollesejot/'),
            ],
            'Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 1,
                'legislation' => '"Άρθρο 3  § 1  Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/programma_esoteriko/'),
            ],
            'Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 3 § 1 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/programmata_ejoteriko/'),
            ],
            'Εκπαιδευτική εκδρομή στο εσωτερικό' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 1,
                'legislation' => 'Άρθρο 3 § 2 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/ekp_esoteriko/'),
            ],
            'Εκπαιδευτική εκδρομή στο εξωτερικό' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 3,
                'legislation' => 'Άρθρο 3 § 2 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/ekp_ejot/'),
            ],
            'Διδακτική επίσκεψη' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 1,
                'legislation' => 'Άρθρο 4 της Y.A. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/didaktikes/'),
            ],
            'Επίσκεψη στη Βουλή των Ελλήνων' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 1,
                'legislation' => 'Άρθρο 7 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/vouli/'),
            ],
            'Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 1,
                'legislation' => 'Άρθρο 8 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/diagon/'),
            ],
            'Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Αδελφοποιήσεων' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/adel/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Προγραμμάτων διεθνών οργανισμών' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/diagon/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Προσκλήσεις σχολείων της περ.α του άρθρου 3 του ν. 4415/2016 (Α΄ 159)' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Επισκέψεων σε ερευνητικά κέντρα, εκπαιδευτικά ιδρύματα, πανεπιστήμια, κέντρα πολιτισμού και/ή αθλητισμού' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό' => [
                'category' => '(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/'),
                'legislation_special_files' => fn () => $this->getExcursionTypeFiles('nomoi/europ/eidika/'),
            ],
            'Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 6,
                'legislation' => 'Υ.Α.25735/Η1/20-02-2020 (ΦΕΚ 625/τ.Β\'/27-02-2020) και Υ.Α.20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/erasmus2/'),
            ],
            'Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1' => [
                'category' => '',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 6,
                'legislation' => 'Υ.Α.25735/Η1/20-02-2020 (ΦΕΚ 625/τ.Β\'/27-02-2020) και Υ.Α.20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β\'/13-02-2020)',
                'legislation_files' => fn () => $this->getExcursionTypeFiles('nomoi/erasmus1/'),
            ],
        ];
    }

    private function getExcursionTypeFiles(string $path): array
    {
        $files = File::glob(public_path("storage/$path").'*.{pdf,doc,docx}', GLOB_BRACE);
        $files = array_map(fn ($file) => Str::after($file, public_path('storage/')), $files);

        return $files;
    }

    public function getExcursionsForSchool(School $school): Collection
    {
        return Excursion::where('school_id', $school->id)
            ->where('school_year_id', $this->currentYear->id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getAllExcursions(): Collection
    {
        return Excursion::where('school_year_id', $this->currentYear->id)
            ->with('school')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getExcursionsQuery(?int $schoolId = null)
    {
        return Excursion::where('school_year_id', $this->currentYear->id)
            ->when($schoolId, function (Builder $query) use ($schoolId): void {
                $query->where('school_id', $schoolId);
            })
            ->with('school');
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Excursion
    {
        $school = Session::get('school');
        if (! $school && Session::get('cas_model_category') === 'user') {
            $school = School::find(Session::get('admin_selected_school'));
        } else {
            throw new Exception('Δεν επιτρέπεται η δημιουργία εκδρομής');
        }

        $data['school_id'] = $school->id;
        $data['school_year_id'] = $this->currentYear->id;
        $data['status'] = 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ';

        return Excursion::create($data);
    }

    public function update(Excursion $excursion, array $data): Excursion
    {
        $excursion->update($data);

        return $excursion->fresh();
    }

    public function delete(Excursion $excursion): bool
    {
        if ($excursion->isDraft() && ! $excursion->hasProtocol()) {
            return $excursion->delete();
        }

        return false;
    }

    /**
     * @return 'ar_prot_sxoleiou'[]|'onoma_ypografonta'[]|'prosfonisi_ypografonta'[]|'hmera_diavivastikou'[]
     */
    public function validateSubmissionRequirements(Excursion $excursion): array
    {
        $required = [
            'ar_prot_sxoleiou',
            'onoma_ypografonta',
            'prosfonisi_ypografonta',
            'hmera_diavivastikou',
        ];

        $missing = [];

        foreach ($required as $field) {
            $value = trim((string) ($excursion->{$field} ?? ''));

            if ($value === '') {
                $missing[] = $field;
            }
        }

        $attributes = new ExcursionFieldMap()->attributes();

        foreach ($attributes as $key => $attribute) {
            $idx = array_search($key, $missing);

            if ($idx === false) {
                continue;
            }
            $missing[$idx] = $attribute;
        }

        return $missing;
    }

    public function canSubmit(Excursion $excursion): bool
    {
        return empty($this->validateSubmissionRequirements($excursion));
    }

    public function submit(Excursion $excursion, string $protocolNumber): Excursion
    {
        $excursion->update([
            'status' => 'ΥΠΟΒΛΗΘΗΚΕ',
            'ar_prot' => $protocolNumber,
            'submit_datetime' => now(),
        ]);

        return $excursion->fresh();
    }

    public function getSchoolYearOptions(): array
    {
        return SchoolYear::orderBy('sxoliko_etos', 'desc')->get();
    }

    public function formComponent(Excursion|string $excursion): string
    {
        $subject = $excursion;
        if ($excursion instanceof Excursion) {
            $subject = $excursion->eidos_ekdromis;
        }

        return match ($subject) {
            'Σχολικός Περίπατος' => 'excursion.form.peripatos',
            'Ημερήσια δίχως διανυκτέρευση' => 'excursion.form.hmerisiaxoris',
            'Πολυήμερη τελευταίας τάξης στο εσωτερικό' => 'excursion.form.pollesesot',
            'Πολυήμερη τελευταίας τάξης στο εξωτερικό' => 'excursion.form.pollesejot',
            'Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό' => 'excursion.form.programma_esoteriko',
            'Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων' => 'excursion.form.programmata_ejoteriko',
            'Εκπαιδευτική εκδρομή στο εσωτερικό' => 'excursion.form.ekp_esoteriko',
            'Εκπαιδευτική εκδρομή στο εξωτερικό' => 'excursion.form.ekp_ejot',
            'Διδακτική επίσκεψη' => 'excursion.form.didaktikes',
            'Επίσκεψη στη Βουλή των Ελλήνων' => 'excursion.form.vouli',
            'Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού' => 'excursion.form.diagon',
            'Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων',
            'Αδελφοποιήσεων',
            'Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων',
            'Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus',
            'Προγραμμάτων διεθνών οργανισμών',
            'Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις',
            'Προσκλήσεις σχολείων της περ.α του άρθρου 3 του ν. 4415/2016 (Α΄ 159)',
            'Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας',
            'Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας',
            'Επισκέψεων σε ερευνητικά κέντρα, εκπαιδευτικά ιδρύματα, πανεπιστήμια, κέντρα πολιτισμού και/ή αθλητισμού',
            'Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό' => 'excursion.form.europ',
            'Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2' => 'excursion.form.erasmus2',
            'Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1' => 'excursion.form.erasmus1',
            default => '',
        };
    }

    public function getLastSigner(): string
    {
        $school = SchoolService::getActiveSchool();

        $excursion = $school->excursions()->where('status', 'ΥΠΟΒΛΗΘΗΚΕ')->orderBy('id', 'desc')->first();

        if ($excursion) {
            return $excursion->onoma_ypografonta;
        }

        return '';
    }
}
