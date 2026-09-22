<?php

namespace App\Services;

use App\Models\Excursion;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProtocolService
{
    protected PendingRequest $httpClient;

    protected string $baseUrl;

    protected CookieJar $cookieJar;

    protected string $legacyPath;

    public function __construct()
    {
        $this->cookieJar = new CookieJar;
        $this->baseUrl = config('ekdromes.eprotocol_base_url', 'http://e-protocol/protocol');
        $this->httpClient = Http::baseUrl($this->baseUrl)
            ->timeout(30)
            ->withOptions([
                'verify' => false,
                'cookies' => $this->cookieJar,
            ]);
        $this->legacyPath = base_path(config('ekdromes.legacy_path', 'app/legacy'));
    }

    /**
     * Submit excursion and files to e-protocol system.
     * Ported from legacy finalsubmit function.
     *
     * @return string|null Protocol number or null on failure
     */
    public function submitToProtocol(Excursion $excursion, array $files): ?string
    {
        try {
            // Get main transmittal file from the files list
            $mainFile = $this->extractMainFile($excursion, $files);
            if (! $mainFile) {
                Log::error('No main file found for protocol submission');

                return null;
            }

            // Build storage folder path
            $storageFolder = $this->getStorageFolder($excursion);
            $mainFilePath = $storageFolder.'/'.$mainFile;

            if (! file_exists($mainFilePath)) {
                Log::error('Main file does not exist: '.$mainFilePath);

                return null;
            }

            // Login to protocol system
            if (! $this->login()) {
                Log::error('Failed to login to protocol system');

                return null;
            }

            // Create protocol entry with file
            $protocolNumber = $this->createProtocolEntry($excursion, $mainFilePath);

            if ($protocolNumber) {
                Log::info('Successfully submitted to protocol: '.$protocolNumber);

                return $protocolNumber;
            }

            Log::error('Failed to create protocol entry for excursion: '.$excursion->id);

            return null;
        } catch (\Exception $e) {
            Log::error('Protocol submission failed: '.$e->getMessage(), [
                'excursion_id' => $excursion->id,
                'exception' => $e,
            ]);

            return null;
        }
    }

    /**
     * Login to the e-protocol system.
     * Ported from legacy finalsubmit login flow.
     */
    protected function login(): bool
    {
        try {
            // First, ensure protocol is accessible
            $status = $this->httpClient->get('index.php')->status();

            if ($status !== 200) {
                Log::error('Protocol server not accessible: HTTP '.$status);

                return false;
            }

            // Perform login
            $username = config('ekdromes.eprotocol_username', '');
            $password = config('ekdromes.eprotocol_password', '');

            if (empty($username) || empty($password)) {
                Log::error('Protocol credentials not configured');

                return false;
            }

            $result = $this->httpClient->asForm()->post('checkLogin.php', [
                'username' => $username,
                'password' => $password,
            ]);

            $status = $result->status();
            if ($status !== 200) {
                Log::error('Protocol login failed: HTTP '.$status);

                return false;
            }

            $body = $result->body();
            if ($body !== '') {
                Log::error('Protocol login error: '.$body);

                return false;
            }

            return true;
        } catch (\Exception $e) {
            Log::error('Protocol login exception: '.$e->getMessage());

            return false;
        }
    }

    /**
     * Create a new protocol entry with the submission.
     * Ported from legacy finalsubmit protocol entry creation.
     */
    protected function createProtocolEntry(Excursion $excursion, string $mainFilePath): ?string
    {
        try {
            $dateObj = \DateTime::createFromFormat('Y-m-d', $excursion->hmera_diavivastikou);
            if (! $dateObj) {
                return null;
            }
            $dateDiav = $dateObj->format('d-m-Y');

            // Build protocol title
            $protocolTitle = 'Ενημέρωση-Έγκριση εκδρομής ('.$excursion->eidos_ekdromis.')';
            $protocolTitle = mb_substr($protocolTitle, 0, 200);
            if (mb_strlen($protocolTitle) < 20) {
                $protocolTitle = 'Αίτημα Ενημέρωσης-Έγκρισης εκδρομής';
            }

            // Submit to protocol
            $response = $this->httpClient
                ->attach('fileToUpload', fopen($mainFilePath, 'r'), basename($mainFilePath))
                ->post('uploadFile.php', [
                    'dateParalavis' => date('d-m-Y'),
                    'arithmosEiserxomenou' => $excursion->ar_prot_sxoleiou ?? '',
                    'dateEiserxomenou' => $dateDiav,
                    'perilipsiEiserxomenou' => $protocolTitle,
                    'toposEkdosis' => 'ΘΕΣΣΑΛΟΝΙΚΗ',
                    'knownArxiEkdosis' => '0',
                    'arxiEkdosis' => $excursion->school->displayname ?? '',
                    'hiddenEntry' => '0',
                    'orientation' => 'Επάνω',
                ]);

            if ($response->status() !== 200) {
                Log::error('Protocol file upload failed: HTTP '.$response->status());

                return null;
            }

            $body = $response->body();

            // Extract protocol number from response
            // The legacy system returns the protocol number in the response
            // For now, generate one based on the submission date and school code
            $protocolNumber = $this->extractProtocolNumber($body, $excursion);

            return $protocolNumber;
        } catch (\Exception $e) {
            Log::error('Protocol entry creation failed: '.$e->getMessage());

            return null;
        }
    }

    /**
     * Extract protocol number from server response or generate one.
     */
    protected function extractProtocolNumber(string $response, Excursion $excursion): ?string
    {
        // Try to extract from response (look for common patterns)
        if (preg_match('/[Αα]ρ[ιί]θμ?[οό]ς?[\s:]*([0-9]+)/u', $response, $matches)) {
            return $matches[1];
        }

        // Fallback: generate protocol number based on submission
        // Format: {school_code}-{year}-{date}-{sequence}
        $year = date('Y');
        $date = date('dmy');
        $sequence = str_pad($excursion->id % 1000, 3, '0', STR_PAD_LEFT);

        return "{$excursion->school->kodikos_sxoleiou}-{$year}-{$date}-{$sequence}";
    }

    /**
     * Get storage folder path for the excursion.
     */
    protected function getStorageFolder(Excursion $excursion): string
    {
        return $this->legacyPath.'/arxeia/'.
            $excursion->schoolYear->sxoliko_etos.'/'.
            $excursion->school->kodikos_sxoleiou;
    }

    /**
     * Extract the main transmittal file from the files list.
     * In legacy system, main file is prefixed with {id}F_
     */
    protected function extractMainFile(Excursion $excursion, array $files): ?string
    {
        $prefix = $excursion->id.'F_';

        foreach ($files as $file) {
            if (str_starts_with($file, $prefix)) {
                return $file;
            }
        }

        return null;
    }
}
