<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Module Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration options for the Authentication module.
    | You can modify these values according to your requirements.
    |
    */

    'name' => 'Authentication',
    'alias' => 'authentication',
    'description' => 'Authentication module for managing authentication related functionality',
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
            'path' => 'uploads/authentication',
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
        'authentication.view',
        'authentication.create',
        'authentication.edit',
        'authentication.delete',
        'authentication.manage',
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Configuration
    |--------------------------------------------------------------------------
    */
    'menu' => [
        'title' => 'Authentication',
        'icon' => 'fas fa-cube',
        'order' => 100,
        'submenu' => [
            // Add submenu items here
        ],
    ],
];