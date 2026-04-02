<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('rahasia'),
                'is_admin' => 1,
            ]
        );

        // Buat akun User biasa
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name'     => 'User Biasa',
                'password' => Hash::make('password'),
                'is_admin' => 0,
            ]
        );
    }
}
