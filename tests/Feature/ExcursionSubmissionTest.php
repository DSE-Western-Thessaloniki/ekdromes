<?php

namespace Tests\Feature;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use App\Services\ExcursionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExcursionSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_reports_missing_submission_fields(): void
    {
        $year = SchoolYear::create([
            'sxoliko_etos' => '2026_2027',
            'is_current' => true,
        ]);

        $school = School::create([
            'school_year_id' => $year->id,
            'kodikos_sxoleiou' => '1901000',
            'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
            'displayname' => 'Γυμνάσιο Δοκιμής',
            'email' => 'school@example.com',
            'phonenumbers' => '2310000000',
        ]);

        $excursion = Excursion::create([
            'school_year_id' => $year->id,
            'school_id' => $school->id,
            'kodikos_sxoleiou' => $school->kodikos_sxoleiou,
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'hmera_epistrofis' => '2026-11-05',
            'ora_anaxorisis' => '08:00:00',
            'ora_epistrofis' => '14:00:00',
            'ar_mathiton' => 20,
            'onoma_arxigos' => 'Γιάννης Παπαδόπουλος',
            'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
        ]);

        $service = new ExcursionService;
        $missing = $service->validateSubmissionRequirements($excursion);

        $this->assertContains('ar_prot_sxoleiou', $missing);
        $this->assertContains('onoma_ypografonta', $missing);
        $this->assertContains('prosfonisi_ypografonta', $missing);
        $this->assertContains('hmera_diavivastikou', $missing);
    }
}
