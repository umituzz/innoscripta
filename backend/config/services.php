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

    'guardianApi' => [
        'api_url' => env('GUARDIAN_API_URL'),
        'api_key' => env('GUARDIAN_API_KEY'),
    ],

    'newsApi' => [
        'api_url' => env('NEWS_API_URL'),
        'api_key' => env('NEWS_API_KEY'),
    ],

    'mediaStackApi' => [
        'api_url' => env('MEDIA_STACK_API_URL'),
        'api_key' => env('MEDIA_STACK_API_KEY'),
    ],

    'newyorkTimesApi' => [
        'api_url' => env('NEWYORK_TIMES_API_URL'),
        'api_key' => env('NEWYORK_TIMES_API_KEY'),
    ],

];
