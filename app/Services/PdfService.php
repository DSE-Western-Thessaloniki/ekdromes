<?php

namespace App\Services;

use App\Models\Excursion;
use Illuminate\Support\Facades\Log;

class PdfService
{
    protected string $legacyPath;

    protected string $storageFolder;

    public function __construct()
    {
        $this->legacyPath = base_path(config('ekdromes.legacy_path', 'app/legacy'));
    }

    /**
     * Generate transmittal letter PDF for the excursion.
     * Ported from legacy BuildPdfs function.
     *
     * @return string|null Path to generated PDF file or null on failure
     */
    public function generateTransmittalLetter(Excursion $excursion): ?string
    {
        try {
            // Create storage folder: arxeia/{year}/{school_code}
            $this->storageFolder = $this->getStorageFolder($excursion);
            if (! $this->ensureStorageFolderExists()) {
                Log::error('Failed to create storage folder: '.$this->storageFolder);

                return null;
            }

            // Generate HTML content based on excursion type
            $html = $this->generateTransmittalHtml($excursion);
            if (! $html) {
                Log::error('Failed to generate HTML for excursion: '.$excursion->id);

                return null;
            }

            // Load legacy TCPDF library with proper path handling
            $tcpdfPath = $this->legacyPath.'/newer_pdflib/tcpdf.php';
            if (! file_exists($tcpdfPath)) {
                Log::error('TCPDF library not found at: '.$tcpdfPath);

                return null;
            }

            // Set working directory for proper relative path resolution
            $oldCwd = getcwd();
            chdir($this->legacyPath);

            try {
                require_once $tcpdfPath;
                require_once $this->legacyPath.'/pdf_functions.php';

                // Create PDF using TCPDF
                $pdf = new \MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);
                \InitializepdfBook($pdf, 11);
                $pdf->AddPage();
                $pdf->writeHTML($html);

                // Save PDF with legacy naming: {id}F_Διαβιβαστικό
                $filename = $excursion->id.'F_Διαβιβαστικό';
                $pdfPath = $this->storageFolder.'/'.$filename.'.pdf';
                $pdf->Output($pdfPath, 'F');

                if (file_exists($pdfPath)) {
                    Log::info('Generated transmittal PDF: '.$pdfPath);

                    return $filename.'.pdf';
                }

                Log::error('PDF was not saved to disk');

                return null;
            } finally {
                chdir($oldCwd);
            }
        } catch (\Exception $e) {
            Log::error('PDF generation failed: '.$e->getMessage());

            return null;
        }
    }

    /**
     * Get the storage folder path for the excursion.
     */
    public function getStorageFolder(Excursion $excursion): string
    {
        return $this->legacyPath.'/arxeia/'.
            $excursion->schoolYear->sxoliko_etos.'/'.
            $excursion->school->kodikos_sxoleiou;
    }

    /**
     * Ensure storage folder exists and is writable.
     */
    protected function ensureStorageFolderExists(): bool
    {
        if (! is_dir($this->storageFolder)) {
            return @mkdir($this->storageFolder, 0755, true);
        }

        return is_writable($this->storageFolder);
    }

    /**
     * Generate HTML content for transmittal letter.
     * Ported from legacy BuildPdfs function with simplified templates.
     */
    protected function generateTransmittalHtml(Excursion $excursion): ?string
    {
        try {
            // Format dates safely
            $dateDiav = '29-08-2026';
            $dateEkdromi = '05-11-2026';

            if ($excursion->hmera_diavivastikou) {
                $dateObj = \DateTime::createFromFormat('Y-m-d', $excursion->hmera_diavivastikou);
                if ($dateObj) {
                    $dateDiav = $dateObj->format('d-m-Y');
                }
            }

            if ($excursion->hmera_ekdromis_anaxorisis) {
                $dateObj = \DateTime::createFromFormat('Y-m-d', $excursion->hmera_ekdromis_anaxorisis);
                if ($dateObj) {
                    $dateEkdromi = $dateObj->format('d-m-Y');
                }
            }

            // Simplified generic transmittal letter template
            $html = <<<'HTML'
<table>
<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br></p>
</td>
<td>
<p>
Θεσσαλονίκη: {date_diav}<br>
Αρ. Πρωτ.: {ar_prot_sxoleiou}<br>
</p>
ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
</td></tr>
</table>

<p><b>ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:</b><br>
Σχολείο: {school_name}<br>
Τηλ.: {phone_numbers}<br>
email: {school_email}<br></p>

<p align="center"><b>Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΕΚΔΡΟΜΗΣ</b></p>

<p style="line-height: 200%;">
Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β'/13-02-2020) και την πράξη <b>{ar_prajis}</b> του Συλλόγου Διδασκόντων σας ενημερώνουμε ότι:
</p>

<ul style="line-height: 150%;">
<li>Η εκδρομή πρόκειται να πραγματοποιηθεί με προορισμό: <b>{proorismos}</b>, στις <b>{date_ekdromi}</b></li>
<li>Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία</li>
<li>Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.</li>
</ul>

<p align="center">{prosfonisi_ypografonta}<br><br><br>
{onoma_ypografonta}</p>
HTML;

            // Replace placeholders with safe values
            $html = str_replace('{date_diav}', $dateDiav ?? 'ΝΑ', $html);
            $html = str_replace('{ar_prot_sxoleiou}', $excursion->ar_prot_sxoleiou ?? 'ΝΑ', $html);
            $html = str_replace('{school_name}', $excursion->school->displayname ?? 'ΝΑ', $html);
            $html = str_replace('{phone_numbers}', $excursion->school->phonenumbers ?? 'ΝΑ', $html);
            $html = str_replace('{school_email}', $excursion->school->email ?? 'ΝΑ', $html);
            $html = str_replace('{ar_prajis}', $excursion->ar_prajis_syllogou ?? 'ΝΑ', $html);
            $html = str_replace('{proorismos}', $excursion->proorismos ?? 'ΝΑ', $html);
            $html = str_replace('{date_ekdromi}', $dateEkdromi ?? 'ΝΑ', $html);
            $html = str_replace('{prosfonisi_ypografonta}', $excursion->prosfonisi_ypografonta ?? 'ΝΑ', $html);

            return str_replace('{onoma_ypografonta}', $excursion->onoma_ypografonta ?? 'ΝΑ', $html);
        } catch (\Exception $e) {
            Log::error('HTML generation exception: '.$e->getMessage());

            return null;
        }
    }
}
