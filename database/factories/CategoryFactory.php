<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        $categories = ['Electronics', 'Furniture', 'Clothing', 'Books', 'Toys', 'Groceries', 'Sports', 'Beauty'];
        return [
            'category_name' => $this->faker->randomElement($categories),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
