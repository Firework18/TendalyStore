<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tags')->delete();

        DB::table('tags')->insert([
            [
                'id' => 1,
                'nombre' => 'Comercio Justo',
                'color' => '#4CAF50',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre' => 'Natural',
                'color' => '#8BC34A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nombre' => 'Orgánico',
                'color' => '#009688',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nombre' => 'Hecho a mano',
                'color' => '#FF9800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nombre' => 'Vegano',
                'color' => '#3F51B5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nombre' => 'Eco-Friendly',
                'color' => '#2E7D32',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nombre' => 'Local',
                'color' => '#795548',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nombre' => 'Artesanal',
                'color' => '#9C27B0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'nombre' => 'Reciclable',
                'color' => '#607D8B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'nombre' => 'Sostenible',
                'color' => '#43A047',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
