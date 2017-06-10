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

    'facebook' => [
        'client_id' => '1886350225022052',
        'client_secret' => '34179f82f7edf846f19b549cff583f91',
        'redirect' => 'http://cursania.dev/facebook/login',
    ],
    'google' => [
        'client_id' => '868147745160-j9v1k9krdf6cullco2rsfk0lnlblm7fl.apps.googleusercontent.com',
        'client_secret' => 'p7egL1Np1KtA4me2cyuUghrI',
        'redirect' => 'http://cursania.dev/google/login',
    ],
    'github' => [
        'client_id' => 'your-github-app-id',
        'client_secret' => 'your-github-app-secret',
        'redirect' => 'http://your-callback-url',
    ],
    'vimeo' => [
        'client_id' => 'ed04d37f9daf819421a336c52f43f63bcb8ba8c5',
        'client_secret' => '5g2FP006z9mxZ7Z45nBl3ChlBRO6OkFW/LvPxDxbf41teUGHZ1TVb+z4GdmnFhudzZGLF38bRI74ONhGM1xPTJLDTKNw7nfPChruyxTF6eWPoTx78MJGO9jLPFJQyW4I',
        'redirect' => 'http://team.cursania.dev/admin/vimeo/validar',
    ],

];
