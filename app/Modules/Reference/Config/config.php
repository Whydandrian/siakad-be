<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Reference Module Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration options for the Reference module.
    | You can modify these values according to your requirements.
    |
    */

    'name' => 'Reference',
    'alias' => 'reference',
    'description' => 'Reference module for managing reference related functionality',
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
            'path' => 'uploads/reference',
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
        'reference.view',
        'reference.create',
        'reference.edit',
        'reference.delete',
        'reference.manage',
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Configuration
    |--------------------------------------------------------------------------
    */
    'menu' => [
        'title' => 'Reference',
        'icon' => 'fas fa-cube',
        'order' => 100,
        'submenu' => [
            // Add submenu items here
        ],
    ],
];