<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimiento>
 */
class MovimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'entregamovimiento' => $this->faker->name,
            'recepcionmovimiento' => $this->faker->name,
            'razonmovimiento' => $this ->faker->paragraph($nbSentences = 3),
            'tipomovimiento' => $this->faker->randomElement($array = array ('Entrada', 'Salida')),
            'fechamovimiento'=> now(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
