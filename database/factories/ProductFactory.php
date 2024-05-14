<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'stroke' => $this->faker->numberBetween(1, 10), // Assuming stroke is a number between 1 and 10
            'price' => $this->faker->randomFloat(2, 0, 1000), // Generates a float number with 2 decimal places between 0 and 1000
            'image' => $this->faker->imageUrl(640, 480, 'products', true) // Generates a random image URL
        ];
    }
}
