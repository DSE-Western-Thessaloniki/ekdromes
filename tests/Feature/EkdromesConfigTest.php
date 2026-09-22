<?php

use App\Services\FileService;
use App\Services\ProtocolService;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

it('preserves every ekdromes configuration value', function (): void {
    $configuration = [
        'legacy_path' => 'configured-legacy',
        'arxeia_path' => '/tmp/configured-arxeia',
        'output_path' => '/tmp/configured-output',
        'eprotocol_base_url' => 'https://protocol.example.test/protocol',
        'eprotocol_username' => 'configured-user',
        'eprotocol_password' => 'configured-password',
        'admin_emails' => ['admin@example.test', 'reports@example.test'],
    ];

    config(['ekdromes' => $configuration]);

    expect(config('ekdromes'))->toBe($configuration);
});

it('uses configured paths and protocol credentials', function (): void {
    config([
        'ekdromes.legacy_path' => 'configured-legacy',
        'ekdromes.arxeia_path' => '/tmp/configured-arxeia',
        'ekdromes.eprotocol_base_url' => 'https://protocol.example.test/protocol',
        'ekdromes.eprotocol_username' => 'configured-user',
        'ekdromes.eprotocol_password' => 'configured-password',
    ]);

    Http::fake(['*' => Http::response()]);

    $fileService = new FileService;
    $protocolService = new ProtocolService;

    $fileServiceReflection = new ReflectionClass($fileService);
    $protocolServiceReflection = new ReflectionClass($protocolService);

    $baseUploadPath = $fileServiceReflection->getProperty('baseUploadPath');
    $baseUrl = $protocolServiceReflection->getProperty('baseUrl');
    $legacyPath = $protocolServiceReflection->getProperty('legacyPath');

    $login = $protocolServiceReflection->getMethod('login');

    expect($baseUploadPath->getValue($fileService))->toBe('/tmp/configured-arxeia')
        ->and($baseUrl->getValue($protocolService))->toBe('https://protocol.example.test/protocol')
        ->and($legacyPath->getValue($protocolService))->toBe(base_path('configured-legacy'))
        ->and($login->invoke($protocolService))->toBeTrue()
        ->and(Http::recorded(fn (Request $request): bool => $request->url() === 'https://protocol.example.test/protocol/index.php'))->toHaveCount(1)
        ->and(Http::recorded(fn (Request $request): bool => $request->url() === 'https://protocol.example.test/protocol/checkLogin.php'))->toHaveCount(1)
        ->and(Http::recorded(fn (Request $request): bool => $request->url() === 'https://protocol.example.test/protocol/checkLogin.php'
            && $request['username'] === 'configured-user'
            && $request['password'] === 'configured-password'))->toHaveCount(1);
});
