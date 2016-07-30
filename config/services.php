<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        //'key'    => env('STRIPE_KEY'),
        //'secret' => env('STRIPE_SECRET'),
        'key'    => 'pk_test_IAd9DWUnAPZUIDf0YRKTFOS8',
        'secret' => 'sk_test_0CMfVj116torUNyLq67ZOwJr',
    ],

    'paypal' => [
        'client_id' => 'Ac0uxgvcBasP2W9IXZPfWJWBrpk3guCfOHFMzJk6Nhwq5cLCDSzE_wsLIx0s98z6nqujN8O2JnSQRWo2',
        'secret' => 'ENspVln1xnqXeTlV1QyJQ5HK7NIYJpHScirmN5srtAl1mfY1tto34SgY_zVd9QYQhzey0l2gqs0rp-hr',
    ],

];
