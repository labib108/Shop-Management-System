<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ext = ['+88017','+88019','+88013','+88014','+88016','+88015'];
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile' => $this->faker->randomElement($ext).$this->faker->numberBetween(0,99999999),
            'address' => $this->faker->address(),
            'user_id' => $this->faker->numberBetween(42,51),
        ];
    }
}
