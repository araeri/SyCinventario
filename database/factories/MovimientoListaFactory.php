<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovimientoLista>
 */
class MovimientoListaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codinventario' => $this->faker->randomNumber($min = 1, $max = 1000),
            'nombreinventario' => $this->faker->name,
            'fotoinventario' => $this->faker->name,
            'tipoinventario' => $this->faker->randomElement($array = array ('Buenas Condiciones', 'En Uso', 'En Mantención', 'En Malas Condiciones')),
            'idmovimientofk' => $this->faker->randomNumber($min = 1, $max = 20),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
