<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feria>
 */
class FeriaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'fecha_evento' => $this->faker->dateTimeBetween('now', '+2 months'),
            'lugar' => $this->faker->city,
            'descripcion' => $this->faker->paragraph,
        ];
    }
}
