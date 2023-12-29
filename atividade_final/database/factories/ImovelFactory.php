<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imovel>
 */
class ImovelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "rua" => fake()->text(30),
            "numero" => fake()->text(30),
            "cidade" => fake()->text(30),
            "cliente_id" => fake()->numberBetween(1,10),
        ];
    }
}
