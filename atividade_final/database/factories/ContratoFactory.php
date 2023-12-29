<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContratoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "descricao" => fake()->text(30),
            "valor" => fake()->randomFloat(2,2,2000),
            "cliente_id" => fake()->numberBetween(1,10),
            "imovel_id" => fake()->numberBetween(1, 10),
        ];
    }
}
