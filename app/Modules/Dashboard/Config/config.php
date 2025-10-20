<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dashboard Module Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration options for the Dashboard module.
    | You can modify these values according to your requirements.
    |
    */

    'name' => 'Dashboard',
    'alias' => 'dashboard',
    'description' => 'Dashboard module for managing dashboard related functionality',
    'version' => '1.0.0',
    'author' => 'Your Name',

    /*
    |--------------------------------------------------------------------------
    | Module Settings
    |--------------------------------------------------------------------------
    */
    'settings' => [
        'pagination' => [
            'per_page' => 15,
            'max_per_page' => 100,
        ],
        'cache' => [
            'enabled' => true,
            'ttl' => 3600, // 1 hour
        ],
        'uploads' => [
            'path' => 'uploads/dashboard',
            'max_size' => 2048, // KB
            'allowed_extensions' => ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    */
    'permissions' => [
        'dashboard.view',
        'dashboard.create',
        'dashboard.edit',
        'dashboard.delete',
        'dashboard.manage',
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Configuration
    |--------------------------------------------------------------------------
    */
    'menu' => [
        'title' => 'Dashboard',
        'icon' => 'fas fa-cube',
        'order' => 100,
        'submenu' => [
            // Add submenu items here
        ],
    ],
];