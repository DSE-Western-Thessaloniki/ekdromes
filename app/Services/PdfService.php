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
            $filename = $view['filename'] ?? $excursion->id.'F_Διαβιβαστικό.pdf';
            $pdfPath = $this->storageFolder.'/'.$filename;
            Pdf::loadView($view['view'], [
                'excursion' => $excursion,
            ])->save($pdfPath);

            if (! file_exists($pdfPath)) {
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
        return Storage::disk('local')->path('/arxeia/'.
            $excursion->schoolYear->sxoliko_etos.'/'.
            $excursion->school->kodikos_sxoleiou);
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

    protected function getExcursionViews(Excursion $excursion): array
    {
        return match ($excursion->eidos_ekdromis) {
            'Σχολικός Περίπατος' => [[
                'view' => 'pdf.peripatos.transmittal-letter',
            ]],
            'Ημερήσια δίχως διανυκτέρευση' => [[
                'view' => 'pdf.hmerisiaxoris.transmittal-letter',
            ]],
            'Πολυήμερη τελευταίας τάξης στο εσωτερικό' => [[
                'view' => 'pdf.pollesesot.transmittal-letter',
            ]],
            default => [],
        };
    }
}
