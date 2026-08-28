<?php

namespace App\Services;

use App\Models\Excursion;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ProtocolService
{
    protected Client $httpClient;
    protected string $baseUrl;

    public function __construct()
    {
        $this->httpClient = new Client([
            'timeout' => 30,
            'verify' => false,
        ]);
        $this->baseUrl = config('ekdromes.eprotocol_base_url', 'http://e-protocol/protocol');
    }

    public function submitToProtocol(Excursion $excursion, array $files): ?string
    {
        try {
            // Login to e-protocol system
            $session = $this->login();

            if (!$session) {
                Log::error('Failed to login to e-protocol system');
                return null;
            }

            // Create protocol entry
            $protocolNumber = $this->createProtocolEntry($excursion, $files, $session);

            if ($protocolNumber) {
                // Logout
                $this->logout($session);
                return $protocolNumber;
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Protocol submission failed: ' . $e->getMessage());
            return null;
        }
    }

    protected function login(): ?string
    {
        try {
            $response = $this->httpClient->post($this->baseUrl . '/login', [
                'form_params' => [
                    'username' => config('ekdromes.eprotocol_username', ''),
                    'password' => config('ekdromes.eprotocol_password', ''),
                ],
            ]);

            return $response->getHeader('X-Session-Id')[0] ?? null;
        } catch (\Exception $e) {
            Log::error('E-protocol login failed: ' . $e->getMessage());
            return null;
        }
    }

    protected function createProtocolEntry(Excursion $excursion, array $files, string $session): ?string
    {
        // TODO: Implement the actual protocol entry creation
        // This would need to match the e-protocol API specifications
        // Port from addToProtocol/ directory

        return null;
    }

    protected function logout(string $session): void
    {
        try {
            $this->httpClient->post($this->baseUrl . '/logout', [
                'headers' => [
                    'X-Session-Id' => $session,
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('E-protocol logout failed: ' . $e->getMessage());
        }
    }
}
