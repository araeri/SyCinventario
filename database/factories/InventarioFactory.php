<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codinventario' => $this->faker->ean8,
            'nombreinventario' => $this->faker->word,
            'tipoinventario'=> $this->faker->randomElement($array = array ('Vehículo', 'Material', 'Herramienta', 'Equipo')),
            'fotoinventario' => $this->faker->image(storage_path('Imagenes'), $width = 640, $height = 480),
            'estadoinventario' => $this->faker->randomElement($array = array ('Buenas Condiciones', 'En Uso', 'En Mantención', 'En Malas Condiciones')),
            'informacioninventario' => $this->faker->sentence($nbWords = 15)
            //'TipoMovimiento' => $this->faker->randomElements($array = array ('Entrada', 'Salida'), $count = 1),
            //'SeleccionInventario' => $this->faker->name,
            //''
        ];
    }
}
