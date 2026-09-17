<?php

namespace App\Services;

use App\Models\School;
use App\Models\SchoolYear;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class SchoolService
{
    public function getSchoolsForYear(SchoolYear $year): Collection
    {
        return School::where('school_year_id', $year->id)
            ->orderBy('displayname')
            ->get();
    }

    public function findSchoolByCode(string $code, ?SchoolYear $year = null): ?School
    {
        $year ??= SchoolYear::getCurrent();

        return School::where('school_year_id', $year->id)
            ->where('kodikos_sxoleiou', $code)
            ->first();
    }

    public function findSchoolByEmail(string $email, ?SchoolYear $year = null): ?School
    {
        $year ??= SchoolYear::getCurrent();

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

    /**
     * @return array<int, string>
     */
    public function getSchoolTypes(): array
    {
        return [
            'ΓΥΜΝΑΣΙΟ',
            'ΛΥΚΕΙΟ',
            'ΕΠΑΛ',
            'ΕΚ',
        ];
    }

    public static function getActiveSchool(): School
    {
        $school = Session::get('school');

        if (! $school && Session::get('cas_model_category') === 'user') {
            $school = School::find(Session::get('admin_selected_school'));
        } else {
            throw new Exception('Δεν έχετε πρόσβαση ως σχολική μονάδα');
        }

        return $school;
    }
}
