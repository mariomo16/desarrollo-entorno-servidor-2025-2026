<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformacionFiscal>
 */
class InformacionFiscalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cif' => fake()->numerify('##########'),
            'direccion' => fake()->address(),
            'empresa_id' => Empresa::factory()
        ];
    }
}
