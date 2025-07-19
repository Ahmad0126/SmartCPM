<?php

namespace Database\Seeders;

use App\Models\KategoriKeluhan;
use App\Models\Keluhan;
use App\Models\Petugas;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'level' => 3
        ]);
        User::factory(100)->create();

        KategoriKeluhan::create(['nama' => 'Keamanan']);
        KategoriKeluhan::create(['nama' => 'Plumbing']);
        KategoriKeluhan::create(['nama' => 'Kebersihan']);
        KategoriKeluhan::create(['nama' => 'Listrik']);

        Petugas::factory(30)->create();
        Keluhan::factory(300)->create();
    }
}
