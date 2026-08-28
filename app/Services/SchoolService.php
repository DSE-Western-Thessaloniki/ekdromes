<?php

namespace App\Services;

use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Cache;

class SchoolService
{
    public function getSchoolsForYear(SchoolYear $year): \Illuminate\Database\Eloquent\Collection
    {
        return School::where('school_year_id', $year->id)
            ->orderBy('displayname')
            ->get();
    }

    public function findSchoolByCode(string $code, ?SchoolYear $year = null): ?School
    {
        $year = $year ?? SchoolYear::getCurrent();

        return School::where('school_year_id', $year->id)
            ->where('kodikos_sxoleiou', $code)
            ->first();
    }

    public function findSchoolByEmail(string $email, ?SchoolYear $year = null): ?School
    {
        $year = $year ?? SchoolYear::getCurrent();

        return School::where('school_year_id', $year->id)
            ->where('email', $email)
            ->first();
    }

    public function importSchoolsFromLegacy(array $legacySchools, SchoolYear $year): int
    {
        $count = 0;

        foreach ($legacySchools as $email => $data) {
            School::updateOrCreate(
                [
                    'school_year_id' => $year->id,
                    'kodikos_sxoleiou' => $data[0],
                ],
                [
                    'typos_sxoleiou' => $data[1],
                    'displayname' => $data[2],
                    'phonenumbers' => $data[3] ?? null,
                    'email' => $email,
                    'usermail' => $data[4] ?? $email,
                ]
            );
            $count++;
        }

        return $count;
    }

    public function getSchoolTypes(): array
    {
        return [
            'ΓΥΜΝΑΣΙΟ',
            'ΛΥΚΕΙΟ',
            'ΕΠΑΛ',
            'ΕΚ',
        ];
    }
}
