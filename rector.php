<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/database',
        __DIR__.'/public',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])
    ->withSkip([
        __DIR__.'/app/legacy',
        __DIR__.'/bootstrap/cache',
    ])
    ->withPreparedSets(
        typeDeclarations: true,
        typeDeclarationDocblocks: true,
        deadCode: true,
        codeQuality: true,
    )
    // uncomment to reach your current PHP version
    ->withPhpSets(php84: true)
    ->withFluentCallNewLine()
    ->withComposerBased(laravel: true)
    ->withTreatClassesAsFinal();
