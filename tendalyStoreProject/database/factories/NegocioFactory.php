<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negocio>
 */
class NegocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(5),
            'descripcion' => $this->faker->sentence(30),
            'historia' => $this->faker->sentence(30),
            'correo' => $this->faker->safeEmail,
            'telefono' => $this->faker->numerify('9#######'),
            'ubicacion' => $this->faker->sentence(20),
            'imagen' => Str::uuid() . '.jpg',
            'estado' => fake()->randomElement(['activo', 'inactivo']),
            'user_id' => $this->faker->randomElement([21,22,23,24]),
            'categoria_negocio_id' => $this->faker->randomElement([1,2]),
            'departamento_id' => $this->faker->randomElement([1]),
            'provincia_id' => $this->faker->randomElement([1]),
            'distrito_id' => $this->faker->randomElement([1]),
        ];
    }
}
