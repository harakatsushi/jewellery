<?php

return [


 //Socialite認証
    'twitter'   => [
        'client_id'     => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect'      => env('TWITTER_REDIRECT'),
    ],
    'yahoojp'  => [
        'client_id'     => env('YAHOO_CLIENT_ID'),
        'client_secret' => env('YAHOO_CLIENT_SECRET'),
        'redirect'      => env('YAHOO_REDIRECT'),
    ],
    'google'    => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect'      => env('GOOGLE_REDIRECT'),
    ],
    'instagram'  => [
        'client_id'     => env('INSTAGRAM_CLIENT_ID'),
        'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
        'redirect'      => env('INSTAGRAM_REDIRECT'),
    ],
];
