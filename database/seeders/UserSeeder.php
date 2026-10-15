<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    // membuat data awal user untuk pengujian
    public function run(): void
    {
        // akun admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // akun user biasa
        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@sekolah.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
