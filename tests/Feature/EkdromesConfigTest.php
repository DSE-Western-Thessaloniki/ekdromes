<?php

use App\Services\FileService;
use App\Services\ProtocolService;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

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

    $fileService = new FileService;
    $protocolService = new ProtocolService;

    $fileServiceReflection = new ReflectionClass($fileService);
    $protocolServiceReflection = new ReflectionClass($protocolService);

    $baseUploadPath = $fileServiceReflection->getProperty('baseUploadPath');
    $baseUrl = $protocolServiceReflection->getProperty('baseUrl');
    $legacyPath = $protocolServiceReflection->getProperty('legacyPath');

    $history = [];
    $handlerStack = HandlerStack::create(new MockHandler([
        new Response(200),
        new Response(200, [], ''),
    ]));
    $handlerStack->push(Middleware::history($history));

    $httpClient = new Client(['handler' => $handlerStack]);
    $httpClientProperty = $protocolServiceReflection->getProperty('httpClient');
    $httpClientProperty->setValue($protocolService, $httpClient);

    $login = $protocolServiceReflection->getMethod('login');

    expect($baseUploadPath->getValue($fileService))->toBe('/tmp/configured-arxeia')
        ->and($baseUrl->getValue($protocolService))->toBe('https://protocol.example.test/protocol')
        ->and($legacyPath->getValue($protocolService))->toBe(base_path('configured-legacy'))
        ->and($login->invoke($protocolService))->toBeTrue()
        ->and($history)->toHaveCount(2)
        ->and((string) $history[0]['request']->getUri())->toBe('https://protocol.example.test/protocol/index.php')
        ->and((string) $history[1]['request']->getUri())->toBe('https://protocol.example.test/protocol/checkLogin.php')
        ->and((string) $history[1]['request']->getBody())->toContain('configured-user', 'configured-password');
});
