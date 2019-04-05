<?php

return [
    'url' => [
        'api' => env('MULTIVERS_URL', 'https://sandbox.api.online.unit4.nl/V110/'),
        'return' => env('MULTIVERS_RETURN', env('APP_URL').'/multivers/return'),
    ],
    'client_id' => env('MULTIVERS_ID'),
];
