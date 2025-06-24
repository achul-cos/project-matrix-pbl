<?php

return [
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-fallback'),
    'server_key' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-fallback'),
    'is_production' => env('MIDTRANS_PRODUCTION', false),
    'is_sanitized' => true,
    'is_3ds' => true,
];