<?php

return [
    'enabled' => true,
    'fallback_route' => 'home',
    'fallback_status_code' => 301,
    'excluded_patterns' => [
        'admin/*',
        'dashboard/admin/*',
        'livewire/*',
        'api/*',
        'glide/*',
    ],
    'environments' => [
        'development',
        'production',
    ],
];
