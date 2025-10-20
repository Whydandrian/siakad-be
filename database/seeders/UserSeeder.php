<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        collect([
            // 1
            [
                'username' => "adminsuper",
                'email' => "adminsuper@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make('qweqwe'),
            ],
        ])->each(function ($data) {
            User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'email_verified_at' => now(),
                'password' => $data['password'],
            ]);
        });
    }
}
