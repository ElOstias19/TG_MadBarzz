<?php

return [
    'vapid' => [
        'subject' => 'mailto:tuemail@ejemplo.com',
        'public_key' => env('VAPID_PUBLIC_KEY'),
        'private_key' => env('VAPID_PRIVATE_KEY'),
    ],
];
