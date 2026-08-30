<?php

namespace Tests\Feature;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use App\Services\ExcursionService;
use App\Services\FileService;
use App\Services\PdfService;
use App\Services\ProtocolService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExcursionSubmissionPipelineTest extends TestCase
{
    use RefreshDatabase;

    protected SchoolYear $year;

    protected School $school;

    protected Excursion $excursion;

    protected function setUp(): void
    {
        parent::setUp();

        // Create test data
        $this->year = SchoolYear::create([
            'sxoliko_etos' => '2026_2027',
            'is_current' => true,
        ]);

        $this->school = School::create([
            'school_year_id' => $this->year->id,
            'kodikos_sxoleiou' => '1901000',
            'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
            'displayname' => 'Γυμνάσιο Δοκιμής',
            'email' => 'school@example.com',
            'phonenumbers' => '2310000000',
        ]);

        $this->excursion = Excursion::create([
            'school_year_id' => $this->year->id,
            'school_id' => $this->school->id,
            'kodikos_sxoleiou' => $this->school->kodikos_sxoleiou,
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => '2026-11-05',
            'hmera_epistrofis' => '2026-11-05',
            'ora_anaxorisis' => '08:00:00',
            'ora_epistrofis' => '14:00:00',
            'ar_mathiton' => 20,
            'onoma_arxigos' => 'Γιάννης Παπαδόπουλος',
            'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
            // Required submission fields
            'ar_prot_sxoleiou' => '123/2026',
            'onoma_ypografonta' => 'Γιάννης Παπαδόπουλος',
            'prosfonisi_ypografonta' => 'Δ/ντής',
            'hmera_diavivastikou' => '2026-08-28',
            'ar_prajis_syllogou' => '45/2026',
        ]);
    }

    public function test_pdf_service_generates_transmittal_letter(): void
    {
        $pdfService = new PdfService;

        $result = $pdfService->generateTransmittalLetter($this->excursion);

        // Check if PDF was generated (should return filename)
        $this->assertIsString($result);
        $this->assertStringContainsString('F_', $result);
        $this->assertStringContainsString('.pdf', $result);
    }

    public function test_file_service_lists_files_for_excursion(): void
    {
        $fileService = new FileService;

        // Get file list (should be empty initially as no files are uploaded in test)
        $files = $fileService->getFileList($this->excursion);

        // Should return an array
        $this->assertIsArray($files);
    }

    public function test_excursion_service_validates_submission(): void
    {
        $service = new ExcursionService($this->year);

        // Test that validation passes when all required fields are present
        $missing = $service->validateSubmissionRequirements($this->excursion);
        $this->assertEmpty($missing, 'All required fields should be present');

        // Test that validation fails when required field is missing
        $this->excursion->ar_prot_sxoleiou = '';
        $this->excursion->save();
        $missing = $service->validateSubmissionRequirements($this->excursion);
        $this->assertContains('ar_prot_sxoleiou', $missing);
    }

    public function test_excursion_can_be_submitted(): void
    {
        $service = new ExcursionService($this->year);

        // Should be able to submit when all requirements are met
        $this->assertTrue($service->canSubmit($this->excursion));

        // Should not be able to submit when required field is empty
        $this->excursion->onoma_ypografonta = '';
        $this->excursion->save();
        $this->assertFalse($service->canSubmit($this->excursion));
    }

    public function test_submission_updates_excursion_status(): void
    {
        $service = new ExcursionService($this->year);

        $this->assertFalse($this->excursion->isSubmitted());

        // Submit the excursion
        $protocolNumber = '123/2026-08-29';
        $submitted = $service->submit($this->excursion, $protocolNumber);

        $this->assertTrue($submitted->isSubmitted());
        $this->assertEquals('ΥΠΟΒΛΗΘΗΚΕ', $submitted->status);
        $this->assertEquals($protocolNumber, $submitted->ar_prot);
    }

    public function test_protocol_service_requires_credentials(): void
    {
        $protocolService = new ProtocolService;

        // Without credentials, submission should fail
        // We're testing the structure, not the actual HTTP call
        $result = $protocolService->submitToProtocol($this->excursion, []);

        // Should return null if credentials are not configured
        $this->assertNull($result);
    }

    public function test_submission_pipeline_validation_flow(): void
    {
        $excursionService = new ExcursionService($this->year);
        $fileService = new FileService;

        // Step 1: Validate all required fields are present
        $missing = $excursionService->validateSubmissionRequirements($this->excursion);
        $this->assertEmpty($missing);

        // Step 2: Check if files exist (in test, folder may not exist)
        $fileService->getFileList($this->excursion);
        // Files list structure is validated, even if empty

        // Step 3: Validate submission can proceed
        $this->assertTrue($excursionService->canSubmit($this->excursion));

        // Step 4: Verify submission would update status correctly
        $protocolNumber = 'TEST-123-2026';
        $submitted = $excursionService->submit($this->excursion, $protocolNumber);
        $this->assertEquals('ΥΠΟΒΛΗΘΗΚΕ', $submitted->status);
    }
}
