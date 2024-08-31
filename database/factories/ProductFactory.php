<?php

namespace Database\Factories;
use Illuminate\Support\Str;

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
            'id_Pr' => Str::random(10),
            'pic' =>fake()->imageUrl(),
            'proName' => fake()->words(3, true),
            'price' => fake()->randomFloat(2, 10, 100),
            'oldPrice' =>fake()->randomFloat(2, 10, 100),
            'description' => fake()->text(200),
            'stockQuantity' => fake()->numberBetween(1, 100),
            // 'valider' => Hash::make('password'),
            'created_at'=>now()
        ];
    }
}
