<?php

namespace App\Services;

use App\Models\Excursion;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PdfService
{
    protected string $storageFolder;

    /**
     * Generate PDFs for the excursion.
     *
     * @return array<string> Paths to generated PDF files
     */
    public function generateExcursionFiles(Excursion $excursion): array
    {
        $excursion->loadMissing(['school', 'schoolYear']);
        $this->storageFolder = $this->getStorageFolder($excursion);
        if (! $this->ensureStorageFolderExists()) {
            throw new Exception('Failed to create storage folder: '.$this->storageFolder);
        }

        $views = $this->getExcursionViews($excursion);
        if (empty($views)) {
            throw new Exception("Δε δημιουργήθηκε διαβιβαστικό γιατί δε βρέθηκε το είδος της εκδρομής '$excursion->eidos_ekdromis'");
        }

        foreach ($views as $view) {
            $filename = $view['filename'] ?? $excursion->id.'A_Διαβιβαστικό.pdf';
            $pdfPath = $this->storageFolder.'/'.$filename;
            Pdf::loadView($view['view'], [
                'excursion' => $excursion,
            ])->save($pdfPath, 'local');

            if (! Storage::disk('local')->exists($pdfPath)) {
                throw new Exception('PDF was not saved to disk');
            }

            Log::info('Generated transmittal PDF: '.$pdfPath);
        }

        return array_map(fn ($item) => $item['filename'] ?? $excursion->id.'F_Διαβιβαστικό.pdf', $views);
    }

    /**
     * Get the storage folder path for the excursion.
     */
    public function getStorageFolder(Excursion $excursion): string
    {
        return 'arxeia/'.
            $excursion->schoolYear->sxoliko_etos.'/'.
            $excursion->school->kodikos_sxoleiou;
    }

    /**
     * Ensure storage folder exists and is writable.
     */
    protected function ensureStorageFolderExists(): bool
    {
        if (! Storage::disk('local')->exists($this->storageFolder)) {
            return Storage::disk('local')->makeDirectory($this->storageFolder);
        }

        return true;
    }

    protected function getExcursionViews(Excursion $excursion): array
    {
        return match ($excursion->eidos_ekdromis) {
            'Σχολικός Περίπατος' => [
                [
                    'view' => 'pdf.peripatos.transmittal-letter',
                ],
            ],
            'Ημερήσια δίχως διανυκτέρευση' => [
                [
                    'view' => 'pdf.hmerisiaxoris.transmittal-letter',
                ],
            ],
            'Πολυήμερη τελευταίας τάξης στο εσωτερικό' => [
                [
                    'view' => 'pdf.pollesesot.transmittal-letter',
                ],
            ],
            'Πολυήμερη τελευταίας τάξης στο εξωτερικό' => [
                [
                    'view' => 'pdf.pollesejot.transmittal-letter',
                ], [
                    'view' => 'pdf.pollesejot.application',
                    'filename' => $excursion->id.'A_Αίτηση.pdf',
                ],
            ],
            'Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό' => [
                [
                    'view' => 'pdf.programma_esoteriko.transmittal-letter',
                ],
            ],
            'Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων' => [
                [
                    'view' => 'pdf.programmata_ejoteriko.transmittal-letter',
                ], [
                    'view' => 'pdf.programmata_ejoteriko.application',
                    'filename' => $excursion->id.'A_Αίτηση.pdf',
                ],
            ],
            'Εκπαιδευτική εκδρομή στο εσωτερικό' => [
                [
                    'view' => 'pdf.ekp_esoteriko.transmittal-letter',
                ],
            ],
            'Εκπαιδευτική εκδρομή στο εξωτερικό' => [
                [
                    'view' => 'pdf.ekp_ejot.transmittal-letter',
                ], [
                    'view' => 'pdf.ekp_ejot.application',
                    'filename' => $excursion->id.'A_Αίτηση.pdf',
                ],
            ],
            'Διδακτική επίσκεψη' => [
                [
                    'view' => 'pdf.didaktikes.transmittal-letter',
                ],
            ],
            'Επίσκεψη στη Βουλή των Ελλήνων' => [
                [
                    'view' => 'pdf.vouli.transmittal-letter',
                ],
            ],
            'Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού' => [
                [
                    'view' => 'pdf.diagon.transmittal-letter',
                ],
            ],
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
            'Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό' => [
                [
                    'view' => 'pdf.europ.transmittal-letter',
                ], [
                    'view' => 'pdf.europ.application',
                    'filename' => $excursion->id.'A_Αίτηση.pdf',
                ],
            ],
            'Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2' => [
                [
                    'view' => 'pdf.erasmus2.transmittal-letter',
                ], [
                    'view' => 'pdf.erasmus2.application',
                    'filename' => $excursion->id.'A_Αίτηση.pdf',
                ],
            ],
            'Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1' => [
                [
                    'view' => 'pdf.erasmus1.transmittal-letter',
                ], [
                    'view' => 'pdf.erasmus1.application',
                    'filename' => $excursion->id.'A_Αίτηση.pdf',
                ],
            ],
            default => [],
        };
    }
}
