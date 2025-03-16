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
        //$electronics_products = ['Computer', 'Mobile phone', 'Laptop ', 'Smart TV', 'Tablet device', 'Smart wrist device', 'Smartwatch', 'Games console'];
        //$clothing_products = ['T-shirt', 'Tops', 'Swim wear', 'Shirt', 'Salwar Suit', 'Palazzo', 'Night dresses (Sleep wear)', 'Kurti', 'Jeans', 'Formal wear', 'Blazer', ' Jacket', 'Denim', 'Blouse'];
        //$shoes_products = ['sports shoe Navy', 'sports shoe olive CKD', 'Sandal', 'Casual ', 'Canvas'];
        //$home_products = ['Chef Knife', 'Cutting Board', 'Can Opener', 'Measuring Cups ', 'Spoons', 'Bowls', 'Colander', 'Salad Spinner', 'Grater', 'Shears', 'Citrus Juicer', 'Honing ', 'Saucepan', 'Pot'];
        $beauty_products = ['Face mask', 'Soap ', 'Bleach ', 'hair removal', 'Foundation', 'Concealer', 'Mascara', 'Eye shadow', 'Eye pencil', 'Eye liner', 'Lip stick', 'make-up products ', ' Hair relaxer', 'Nail bleach'];

        return [
            'user_id' => User::inRandomOrder()->first()->id ?? 55,
            'category_id' => 54,
            'name' => $this->faker->randomElement($beauty_products),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2,1,9999),
            'unit' => $this->faker->numberBetween(1,1000),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
