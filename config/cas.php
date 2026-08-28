<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CAS Server Configuration
    |--------------------------------------------------------------------------
    */

    'host' => env('CAS_HOST', 'sso.sch.gr'),
    'port' => env('CAS_PORT', 443),
    'scheme' => env('CAS_SCHEME', 'https'),
    'path' => env('CAS_PATH', '/cas'),

    /*
    |--------------------------------------------------------------------------
    | Admin Email Addresses
    |--------------------------------------------------------------------------
    |
    | These email addresses have admin privileges (can view all schools).
    |
    */

    'admin_emails' => [
        'kmouratid@sch.gr',
        'georgio@sch.gr',
        'theint@sch.gr',
        'tilsotiria@sch.gr',
        'iperchan@sch.gr',
    ],

];
