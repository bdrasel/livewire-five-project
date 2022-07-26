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
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(),
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(2000),
            'price' => $this->faker->randomFloat(2, 5, 1000),
        ];
    }
}
