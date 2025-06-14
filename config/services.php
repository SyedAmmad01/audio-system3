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

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'stripe' => [
        'key' => env('pk_test_51PpyOQ2L6I0AMRJqEBHycjxPQh47thgHgIO7WHr1IVsQhGACB5Ti8yoAkX0ZV1G6qYA97YUwBv3UQ4t37LWJu1zD00iMsuIyon'),
        'secret' => env('sk_test_51PpyOQ2L6I0AMRJqaYlppBLHwB7AlmI6a0BjRplKNAfyaDAtFln4HAoWsXxqmLGgXIhtrMJ5S61F74MBHc7jmmzz00KEJUtKZP'),
    ],

];
