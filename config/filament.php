<?php

use Filament\Panel;

return [
    // ... other filament configurations ...

    'panels' => [
        'admin' => [
            'path' => 'admin',
            'auth' => [
                'guard' => env('FILAMENT_AUTH_GUARD', 'web'),
                'password_reset' => [
                    'enabled' => true,
                ],
            ],
            'database_notifications' => [
                'enabled' => true,
                'polling_interval' => '30s',
            ],
        ],
        'siswa' => [
            'path' => 'siswa',
            'auth' => [
                'guard' => 'web',
                'password_reset' => [
                    'enabled' => true,
                ],
            ],
            'dark_mode' => false, // Force light mode for student panel
            'sidebar_collapsible_on_desktop' => true,
            'max_content_width' => 'full',
        ],
        'guru' => [
            'path' => 'guru',
            'auth' => [
                'guard' => 'web',
                'password_reset' => [
                    'enabled' => true,
                ],
            ],
            'database_notifications' => [
                'enabled' => true,
                'polling_interval' => '30s',
            ],
            'spa' => true, // Enable Single Page Application mode
        ],
    ],

    // ... other filament configurations ...
];