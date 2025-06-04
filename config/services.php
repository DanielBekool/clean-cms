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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'mailgun' => [
        'transport' => 'mailgun',
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'social' => [
        'facebook' => env('CMS_FACEBOOK'),
        'twitter' => env('CMS_TWITTER'),
        'instagram' => env('CMS_INSTAGRAM'),
        'linkedin' => env('CMS_LINKEDIN'),
        'youtube' => env('CMS_YOUTUBE'),
        'whatsapp' => env('CMS_WHATSAPP'),
    ],
    'contact' => [
        'email1' => env('CMS_SITE_EMAIL'),
        'email2' => env('CMS_SITE_EMAIL2'),
        'phone1' => env('CMS_SITE_PHONE'),
        'phone2' => env('CMS_SITE_PHONE2'),
        'address1' => env('CMS_ADDRESS'),
        'short_address1' => env('CMS_SHORT_ADDRESS'),
        'address2' => env('CMS_ADDRESS2'),
        'link_address1' => env('CMS_LINK_ADDRESS'),
        'link_address2' => env('CMS_LINK_ADDRESS2'),
        'contact_map' => env('CMS_CONTACT_MAP'),
    ],

];
