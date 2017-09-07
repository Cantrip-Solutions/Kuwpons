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
        'client_id' => '1725207344448202',
        'client_secret' => 'bfdeb731a67a637aac402413b2ffb8db',
        'redirect' => URL::to('login/facebook/callback'),
    ],

    'google' => [
        // 'client_id' => 'kuwpons',
        'client_id' => '605313409748-3i0jbv4gg6lhrlrfnfp4tl4t0ovv57fs.apps.googleusercontent.com',
        'client_secret' => 'uye0V8Rtz537jiNbhdTqmBzi',
        // 'client_secret' => 'AIzaSyAfiImMTa9QjKSM94UcYx5ctzl3uA364qs',
        // 'redirect' => URL::to('login/google/callback'),
        'redirect' => 'http://ec2-18-220-22-75.us-east-2.compute.amazonaws.com/login/google/callback',
        // 'redirect' => 'http://18.220.22.75/login/google/callback',
    ],

];
