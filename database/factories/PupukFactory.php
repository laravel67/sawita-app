<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pupuk>
 */
class PupukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->ean8, // Generate a unique code
            'name' => $this->faker->word, // Generate a random word for name
            'category_id' => Category::factory()->create()->id, // Create a new category and use its ID
            'satuan' => $this->faker->randomElement(['Karung', 'Kilogram']), // Randomly select a unit
            'stok' => $this->faker->numberBetween(0, 1000), // Generate a random stock quantity
            'image' => null, // Initialize image as null
        ];
    }
}
