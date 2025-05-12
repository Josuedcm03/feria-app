<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprendedor>
 */
class EmprendedorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'telefono' => $this->faker->numerify('8#######'),
            'rubro' => $this->faker->word,
        ];
    }
}
