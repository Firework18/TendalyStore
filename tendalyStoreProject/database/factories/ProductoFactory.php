<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->words(2, true),
            'descripcion' => $this->faker->sentence(10),
            'imagen' => 'default.jpg', 
            'precio' => $this->faker->randomFloat(2, 5, 200),
            'stock' => $this->faker->numberBetween(0, 100),
            'negocio_id' => $this->faker->randomElement([5]),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'precio_oferta' => $this->faker->optional()->randomFloat(2, 3, 150),
            'unidad_medida' => $this->faker->randomElement(['unidad', 'kg', 'lt']),
        ];
    }
}
