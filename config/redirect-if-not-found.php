<?php


return [
    /**
     * Enable or disable robots.txt file generation
     */
    'enabled' => true,

    /**
     * Default route to redirect to when accessing restricted paths
     */
    'fallback_route' => 'home',

    /**
     * HTTP status code used for fallback redirects
     */
    'fallback_status_code' => 301,

    /**
     * Patterns that should be excluded from robots.txt indexing
     * Each pattern supports wildcard matching with *
     */
    'excluded_patterns' => [
        'admin/*',
        'dashboard/admin/*',
        'livewire/*',
        'api/*',
        'glide/*',
    ],

    /**
     * List of environments where robots.txt generation is active
     */
    'environments' => [
        'development',
        'production',
    ],
];
