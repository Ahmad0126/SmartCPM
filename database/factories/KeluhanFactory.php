<?php

namespace Database\Factories;

use App\Models\KategoriKeluhan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluhan>
 */
class KeluhanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random();
        $kategori = KategoriKeluhan::all()->random();

        return [
            'id_user' => $user->id,
            'id_kategori' => $kategori->id,
            'no_keluhan' => 00 . fake()->numberBetween(100, 999),
            'deskripsi' => fake()->realText(167),
            'tanggal' => fake()->dateTimeBetween('-1 years')->format('Y-m-d'),
            'path_foto' => 'storage/'.'team-1-800x800.jpg',
            'status' => Arr::random(['open', 'in_progress', 'resolved', 'closed']),
        ];
    }
}
