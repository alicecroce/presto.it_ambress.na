<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => 'e9e9c101a2d91029e49d',
        'client_secret' => 'deb5186b56912da831039ff737f5daa07f9a91da',
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],

    'google' => [
        'client_id' => '317380182643-1nfgba0ij750sv81n1p137a059p0ejm5.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/authorized/google/callback',
    ],

];
