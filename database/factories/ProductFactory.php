<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\category;

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
            'user_id' => User::inRandomOrder()->first()->id ?? 11,
            'category_id' => category::inRandomOrder()->first()->id ?? 1,
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2,1,9999999),
            'unit' => $this->faker->numberBetween(1,1000),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
