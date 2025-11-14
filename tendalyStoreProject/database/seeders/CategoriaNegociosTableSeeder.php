<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaNegociosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categoria_negocios')->delete();

        DB::table('categoria_negocios')->insert([
            [
                'id' => 1,
                'nombre' => 'Comida',
                'descripcion' => 'Negocios dedicados a la venta de alimentos preparados.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre' => 'Artesanía',
                'descripcion' => 'Productos hechos a mano con técnicas tradicionales.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nombre' => 'Tecnología',
                'descripcion' => 'Artículos electrónicos, gadgets y servicios tecnológicos.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nombre' => 'Moda',
                'descripcion' => 'Ropa, calzado y accesorios de estilo.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nombre' => 'Salud y Belleza',
                'descripcion' => 'Productos y servicios para el cuidado personal y estético.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nombre' => 'Hogar',
                'descripcion' => 'Artículos, muebles y decoración para el hogar.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nombre' => 'Mascotas',
                'descripcion' => 'Productos y servicios para el cuidado de animales domésticos.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nombre' => 'Servicios',
                'descripcion' => 'Servicios profesionales, técnicos y personales.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'nombre' => 'Educación',
                'descripcion' => 'Cursos, talleres y servicios educativos.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'nombre' => 'Entretenimiento',
                'descripcion' => 'Actividades recreativas, eventos y productos de ocio.',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
