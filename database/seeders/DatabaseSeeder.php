<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    // menjalankan semua seeder
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            InformasiSeeder::class,
        ]);
    }
}
