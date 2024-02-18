<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Garden>
 */
class GardenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'lokasi' => $this->faker->city,
            'luas' => $this->faker->numberBetween(100, 10000),
            'satuan_luas' => 'hektar', // Anda bisa menyesuaikan satuan luas sesuai kebutuhan
            'map' => $this->faker->url,
            'image' => $this->faker->imageUrl(), // Gambar secara acak dari URL
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
