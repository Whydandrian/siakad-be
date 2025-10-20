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
                'label' => 'Cari data',
                'placeholder' => 'Cari data...',
            ],
        ],
        'dropdown' => [
            'notification' => [
                'label' => 'Notifikasi',
                'status' => [
                    'read' => 'Dibaca',
                    'unread' => 'Belum dibaca',
                ],
            ],
            'fast-action' => [
                'label' => 'Aksi cepat',
                'list' => [
                    'available'=> 'Aksi cepat',
                ],
            ],
            'language' => [
                'label' => 'Bahasa',
                'current' => 'Bahasa yang aktif',
                'list' => [
                    'available'=> 'Bahasa yang tersedia',
                ],
            ],
            'switch-role' => [
                'label' => 'Ganti hak akses',
                'current' => 'Role saat ini',
                'list' => [
                    'available'=> 'Hak akses anda',
                ],
            ],
            'profile' => [
                'label' => 'Login sebagai',
                'list' => [
                    'logout'=> 'Keluar',
                ],
            ],
        ],
    ],
    'left-sidebar' => [
        'dashboard' => 'Dashboard',
        'user' => 'Users',
        'academic' => 'Akademik',
        'equivalence' => 'Ekovalensi',
        'report' => 'Laporan',

        'documentation' => 'Manual',
    ],

];