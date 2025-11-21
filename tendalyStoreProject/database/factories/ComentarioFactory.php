<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comentario'=>$this->faker->sentence(3),
            'rating'=>$this->faker->numberBetween(1,5),
            'negocio_id'=>$this->faker->randomElement([1]),
            'user_id'=>$this->faker->randomElement([6,7,8,9,10,11,12,13,14,15]),
        ];
    }
}
