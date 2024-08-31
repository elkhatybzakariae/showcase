<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $villes = Ville::pluck('id_V')->toArray();
        return [
            'id_Cl' => Str::random(10),
            'nomcomplet' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'Phone' => fake()->phoneNumber(),
            'ville' =>fake()->city(),
            'adress' => fake()->address(),
            'password' => Hash::make('password'),
            'created_at'=>now()

        ];
    }
}
