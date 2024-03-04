<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama = fake()->name();
        $slug = Str::slug($nama);
        return [
            'namapelanggan'=> $nama,
            'slug'=> $slug,
            'alamat'=> fake()->address(),
            'nomortelepon'=>fake()->phoneNumber(),
            'ismember'=> fake()->boolean()
        ];
    }
}
