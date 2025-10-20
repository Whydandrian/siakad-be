<?php

return [

    'navbar' => [
        'title' => 'SIAKAD',
        'buttons' => [
            'login' => [
                'label' => 'Login',
            ],
        ],
        'input' => [
            'search' => [
                'label' => 'Search',
                'placeholder' => 'Search...',
            ],
        ],
        'dropdown' => [
            'notification' => [
                'label' => 'Notifications',
                'status' => [
                    'read' => 'Read',
                    'unread' => 'Unread',
                ],
            ],
            'fast-action' => [
                'label' => 'Fast Action',
                'list' => [
                    'available'=> 'Available action',
                ],
            ],
            'language' => [
                'label' => 'Language',
                'current' => 'Active language',
                'list' => [
                    'available'=> 'Available languages',
                ],
            ],
            'switch-role' => [
                'label' => 'Switch Role',
                'current' => 'Current Role',
                'list' => [
                    'available'=> 'Your roles',
                ],
            ],
            'profile' => [
                'label' => 'Signed in as',
                'list' => [
                    'logout'=> 'Logout',
                ],
            ],
        ],
    ],
    'left-sidebar' => [
        'dashboard' => 'Dashboard',
        'user' => 'Users',
        'academic' => 'Academic',
        'equivalence' => 'Equivalence',
        'report' => 'Reports',

        'documentation' => 'Documentation',

    ],

];