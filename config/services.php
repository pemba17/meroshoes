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

    'google' => [
    'client_id' => '872209580067-58eanuvcjfk3n47hp9fs9mrj9eor7lp4.apps.googleusercontent.com',
    'client_secret' => 'TBrCixNtHg_p_uvZzmKl_m93',
    'redirect' => 'http://localhost/meroshopping/public/login/google/callback',
    ],

    'facebook' => [
    'client_id' => '194787728964610',
    'client_secret' => 'd399e4297b4d68f359e65836592bc98f',
    'redirect' => 'http://localhost/meroshopping/public/login/facebook/callback',
    ],



];
