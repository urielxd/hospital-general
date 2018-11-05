<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '701876034054-ofb34e0hi8nqfqr28d7lhuu0j131s9ne.apps.googleusercontent.com',         // Your GitHub Client ID
        'client_secret' => 'G3orfvbdASkEpY3r7CMaxhMq', // Your GitHub Client Secret
        //'redirect' => 'http://localhost:8000/auth/google/callback',
        'redirect' => 'https://hospital-regional.herokuapp.com/auth/google/callback',
    ],

];
