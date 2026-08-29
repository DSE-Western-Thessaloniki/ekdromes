<?php

namespace App\Services;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class FileService
{
    protected string $baseUploadPath;

    public function __construct()
    {
        $this->baseUploadPath = config('ekdromes.arxeia_path', storage_path('app/arxeia'));
    }

    public function getSchoolDir(SchoolYear $year, School $school): string
    {
        $dir = $this->baseUploadPath.'/'.$year->sxoliko_etos.'/'.$school->kodikos_sxoleiou;

        if (! File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        return $dir;
    }

    public function uploadFile(Excursion $excursion, UploadedFile $file, string $type = 'U'): string
    {
        $dir = $this->getSchoolDir($excursion->schoolYear, $excursion->school);
        $filename = $excursion->id.$type.'_'.$file->getClientOriginalName();
        $file->move($dir, $filename);

        return $filename;
    }

    public function getFiles(Excursion $excursion): array
    {
        $dir = $this->getSchoolDir($excursion->schoolYear, $excursion->school);
        $files = [];

        if (! File::isDirectory($dir)) {
            return $files;
        }

        $pattern = $excursion->id.'[UFA]_*';
        $foundFiles = glob($dir.'/'.$pattern);

        foreach ($foundFiles as $filePath) {
            $basename = basename($filePath);
            $type = 'U'; // default user uploaded
            if (str_starts_with($basename, $excursion->id.'F_')) {
                $type = 'F'; // final/generated
            } elseif (str_starts_with($basename, $excursion->id.'A_')) {
                $type = 'A'; // approved
            }

            $files[] = [
                'name' => $basename,
                'original_name' => substr($basename, strlen($excursion->id.$type.'_')),
                'type' => $type,
                'size' => filesize($filePath),
                'path' => $filePath,
            ];
        }

        return $files;
    }

    public function downloadFile(Excursion $excursion, string $filename): ?string
    {
        $dir = $this->getSchoolDir($excursion->schoolYear, $excursion->school);
        $path = $dir.'/'.$filename;

        if (File::exists($path)) {
            return $path;
        }

        return null;
    }

    public function deleteFile(Excursion $excursion, string $filename): bool
    {
        $dir = $this->getSchoolDir($excursion->schoolYear, $excursion->school);
        $path = $dir.'/'.$filename;

        if (File::exists($path)) {
            return File::delete($path);
        }

        return false;
    }

    /**
     * Get list of files for an excursion.
     * Ported from legacy GetFileList function.
     * Filters files by patterns: {id}U_, {id}F_, {id}A_
     */
    public function getFileList(Excursion $excursion): array
    {
        $legacyPath = base_path(config('ekdromes.legacy_path', 'app/legacy'));
        $storeFolder = $legacyPath.'/arxeia/'.
            $excursion->schoolYear->sxoliko_etos.'/'.
            $excursion->school->kodikos_sxoleiou;

        if (! is_dir($storeFolder)) {
            return [];
        }

        $files = scandir($storeFolder);
        if ($files === false) {
            return [];
        }

        $fileList = [];
        $prefix = $excursion->id;

        foreach ($files as $filename) {
            // Filter by legacy file prefixes: U_ (user uploaded), F_ (final auto), A_ (auto)
            if (str_starts_with($filename, "{$prefix}U_") ||
                str_starts_with($filename, "{$prefix}F_") ||
                str_starts_with($filename, "{$prefix}A_")) {
                $fileList[] = $filename;
            }
        }

        return $fileList;
    }
}
