<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Sawita',
            'email' => 'example@gmail.com',
            'contact' => '08xxxxxxxxxx',
            'address' => 'Universitas Dharmas Indonesi',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, eligendi! Nemo, dolorem consequatur iure architecto rerum labore ducimus sequi mollitia, deleniti temporibus veritatis vero esse a cupiditate voluptates perferendis velit!',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, eligendi! Nemo, dolorem consequatur iure architecto rerum labore ducimus sequi mollitia, deleniti temporibus veritatis vero esse a cupiditate voluptates perferendis velit!',
            'image' => null,
        ];
    }
}
