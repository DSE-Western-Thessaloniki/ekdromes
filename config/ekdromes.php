<?php

return [
    'legacy_path' => env('EKDROMES_LEGACY_PATH', 'app/legacy'),
    'arxeia_path' => env('EKDROMES_ARXEIA_PATH', storage_path('app/private/arxeia')),
    'output_path' => env('EKDROMES_OUTPUT_PATH', storage_path('app/private/output')),
    'eprotocol_base_url' => env('EPROTOCOL_BASE_URL', 'http://e-protocol/protocol'),
    'eprotocol_username' => env('EPROTOCOL_USERNAME', ''),
    'eprotocol_password' => env('EPROTOCOL_PASSWORD', ''),
    'skip_protocol_submission' => env('EKDROMES_SKIP_PROTOCOL_SUBMISSION', false),
];
