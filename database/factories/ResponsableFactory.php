<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responsable>
 */
class ResponsableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nomentresponsable' => $this->faker->firstName(),
            'nomrecepresponsable' => $this->faker->firstname(),
            'razonresponsable' => $this->faker->sentence($nbWords = 15)
        ];
    }
}
