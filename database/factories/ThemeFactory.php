<?php

namespace Database\Factories;

use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Theme>
 */
class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'photo' => Image::imageUrl($width = 640, $height = 480, 'business', true),
        ];
    }
}
