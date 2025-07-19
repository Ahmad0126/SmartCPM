<?php

namespace Database\Factories;

use App\Models\KategoriKeluhan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kategori = KategoriKeluhan::all()->random();
        return [
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'no_hp' => fake()->unique()->phoneNumber(),
            'id_kategori' => $kategori->id,
        ];
    }
}
