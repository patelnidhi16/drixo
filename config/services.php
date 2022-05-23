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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'google' => [
        'client_id' => '791685701165-2nk9rju4ug4v1ht6md8ts05mj5962fvl.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '2798301146983376',
        'client_secret' => '84cf34434fe8711b18f316cf8b799e7d',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'linkedin' => [
        'client_id' => '77s27g2nv2824y',
        'client_secret' => 'B0V5G99IcqoKQU7o',
        'redirect' => 'http://localhost:8000/auth/linkedin/callback',
    ],
    'github' => [
        'client_id' => '75a8c74e512fa5d268d8',
        'client_secret' => '511782342f9fffdb90fea6da00c2ffc08dff23ed',
        'redirect' => 'http://127.0.0.1:8000/auth/github/callback',
    ],
    
    
];
