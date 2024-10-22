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
            'name'=> fake()->name(),
            'description'=> fake()->sentence(3),
            'price'=> fake()->numberBetween(200, 6000),
            'image'=>'fake2.jpg',
            'category_id'=> fake()->numberBetween(1, 21)
        ];
    }
}
