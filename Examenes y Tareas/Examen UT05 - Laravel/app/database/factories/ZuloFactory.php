<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Especulador;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zulo>
 */
class ZuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(2),
            'descripcion' => fake()->sentence(),
            'ubicacion' => fake()->address(),
            'precio' => fake()->randomFloat(),
            'superficie' => fake()->numberBetween(1, 20),
            'especulador_id' => Especulador::inRandomOrder()->first()->id,
            'created_at' => now()
        ];
    }
}
