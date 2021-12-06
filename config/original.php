<?php

return [

  
    'to_mail' => env('TO_MAIL', 'test@tes.com'),

       'recaptcha' => [
        'v3' => [
            'site_key'   => env('RECAPTCHA_V3_SITE_KEY'),
            'secret_key' => env('RECAPTCHA_V3_SECRET_KEY'),
        ],
    ],
];
