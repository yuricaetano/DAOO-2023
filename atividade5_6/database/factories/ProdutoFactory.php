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
            "nome" => fake()->text(30),
            "descricao" => fake()->text(30),
            "qtd_estoque" => fake()->numberBetween(1, 100), // Substituído fake()->text(30) por fake()->numberBetween(1, 100)
            "preco" => fake()->numberBetween(1, 10),
            "importado" => fake()->text(30),
            
        ];
    }
}
