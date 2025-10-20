<?php

namespace App\Modules\Authentication\Services\AuthService;

use App\Modules\Authentication\Repositories\UserRepository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(
        private UserRepository $repository
    ) {}
    
    public function login(array $data)
    {

        $user = $this->repository->findByUsername($data['username']);
        if (!$user) {
            return [
                'success' => false,
                'message' => 'Username tidak ditemukan',
                'errors' => [
                    'username' => ['Username tidak ditemukan dalam sistem']
                ]
            ];
        }
        
        if (!Hash::check($data['password'], $user->password)) {
            return [
                'success' => false,
                'message' => 'Password tidak sesuai',
                'errors' => [
                    'password' => ['Password yang Anda masukkan tidak sesuai']
                ]
            ];
        }
        
        // Login berhasil
        Auth::login($user);
        
        return [
            'success' => true,
            'message' => 'Login berhasil',
            'user' => $user,
            'redirect' => route('dashboard.index') // Sesuaikan dengan route dashboard Anda
        ];
    }
    
    public function logout()
    {
        Auth::logout();

        return [
            'success' => true,
            'message' => 'Logout berhasil'
        ];

    }
}
