<?php

namespace App\Services;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\DB;

class ExcursionService
{
    public function __construct(
        protected SchoolYear $currentYear
    ) {
        $this->currentYear = SchoolYear::getCurrent();
    }

    public function getCurrentYear(): SchoolYear
    {
        return $this->currentYear;
    }

    public function getExcursionTypes(): array
    {
        return [
            'peripatos' => [
                'name' => 'Σχολικός Περίπατος',
                'description' => 'Σχολικός περίπατος εντός ή εκτός Περιφερειακής Ενότητας',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 2,
                'legislation' => 'Π.Δ. 54/2017',
            ],
            'hmerisiaxoris' => [
                'name' => 'Ημερήσια Εκδρομή χωρίς διανυκτέρευση',
                'description' => 'Ημερήσια εκδρομή χωρίς διανυκτέρευση',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 2,
                'legislation' => 'Π.Δ. 54/2017',
            ],
            'pollesesjot' => [
                'name' => 'Πολλήμερη Εκδρομή εκτός Τόπου Εκπαίδευσης',
                'description' => 'Πολλήμερη εκδρομή με διανυκτέρευση',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 4,
                'legislation' => 'Π.Δ. 54/2017',
            ],
            'ekp_esoteriko' => [
                'name' => 'Εκπαιδευτική Εκδρομή Εσωτερικού',
                'description' => 'Εκπαιδευτική εκδρομή εντός χώρας',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 3,
                'legislation' => 'Π.Δ. 54/2017',
            ],
            'europ' => [
                'name' => 'Ευρωπαϊκό Πρόγραμμα',
                'description' => 'Συμμετοχή σε ευρωπαϊκό πρόγραμμα',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 5,
                'legislation' => 'Ευρωπαϊκό πλαίσιο',
            ],
            'erasmus1' => [
                'name' => 'Erasmus+ ΚΑ1',
                'description' => 'Εκπαιδευτικό μετακίνηση προσωπικού',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 4,
                'legislation' => 'Erasmus+ KA1',
            ],
            'erasmus2' => [
                'name' => 'Erasmus+ ΚΑ2',
                'description' => 'Στρατηγικές συνεργασίες',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 4,
                'legislation' => 'Erasmus+ KA2',
            ],
            'adel' => [
                'name' => 'Αδελφοποίηση',
                'description' => 'Προγράμματα αδελφοποίησης',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 3,
                'legislation' => 'Π.Δ. 54/2017',
            ],
            'vouli' => [
                'name' => 'Επίσκεψη στη Βουλή',
                'description' => 'Επίσκεψη στο Ελληνικό Κοινοβούλιο',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 2,
                'legislation' => 'Π.Δ. 54/2017',
            ],
            'diagon' => [
                'name' => 'Διαγωνισμός/Έκθεση/Εκδήλωση',
                'description' => 'Συμμετοχή σε διαγωνισμό ή έκθεση',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 2,
                'legislation' => 'Π.Δ. 54/2017',
            ],
            'programma_esoteriko' => [
                'name' => 'Πρόγραμμα Εσωτερικού',
                'description' => 'Εκπαιδευτική εκδρομή βάσει προγράμματος',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 3,
                'legislation' => 'Π.Δ. 54/2017',
            ],
            'didaktikes' => [
                'name' => 'Διδακτική Επίσκεψη',
                'description' => 'Διδακτική επίσκεψη σε θεσμό',
                'school_types' => ['ΓΥΜΝΑΣΙΟ', 'ΛΥΚΕΙΟ', 'ΕΠΑΛ', 'ΕΚ'],
                'min_files' => 2,
                'legislation' => 'Π.Δ. 54/2017',
            ],
        ];
    }

    public function getExcursionsForSchool(School $school): \Illuminate\Database\Eloquent\Collection
    {
        return Excursion::where('school_id', $school->id)
            ->where('school_year_id', $this->currentYear->id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getAllExcursions(): \Illuminate\Database\Eloquent\Collection
    {
        return Excursion::where('school_year_id', $this->currentYear->id)
            ->with('school')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $data): Excursion
    {
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
        if ($excursion->isDraft() && !$excursion->hasProtocol()) {
            return $excursion->delete();
        }
        return false;
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
}
