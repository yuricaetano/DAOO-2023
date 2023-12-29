<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Roommate>
 */
class RoommateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nome" => fake()->text(30),
            "telefone" => fake()->text(30),
            "cpf" => fake()->cpf(false),
            "email" => fake()->text(30),
        ];
    }
}
