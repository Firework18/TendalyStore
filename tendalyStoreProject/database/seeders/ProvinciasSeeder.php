<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciasSeeder extends Seeder
{
    public function run()
    {
        DB::table('provincias')->delete();

        DB::table('provincias')->insert([
            // AMAZONAS (1)
            ['id' => 1, 'departamento_id' => 1, 'nombre' => 'Chachapoyas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'departamento_id' => 1, 'nombre' => 'Bagua', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'departamento_id' => 1, 'nombre' => 'Bongará', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'departamento_id' => 1, 'nombre' => 'Condorcanqui', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'departamento_id' => 1, 'nombre' => 'Luya', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'departamento_id' => 1, 'nombre' => 'Rodríguez de Mendoza', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'departamento_id' => 1, 'nombre' => 'Utcubamba', 'created_at' => now(), 'updated_at' => now()],

            // ÁNCASH (2)
            ['id' => 8, 'departamento_id' => 2, 'nombre' => 'Huaraz', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'departamento_id' => 2, 'nombre' => 'Aija', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'departamento_id' => 2, 'nombre' => 'Bolognesi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'departamento_id' => 2, 'nombre' => 'Carhuaz', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'departamento_id' => 2, 'nombre' => 'Casma', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'departamento_id' => 2, 'nombre' => 'Corongo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'departamento_id' => 2, 'nombre' => 'Huari', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'departamento_id' => 2, 'nombre' => 'Huarmey', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'departamento_id' => 2, 'nombre' => 'Huaylas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'departamento_id' => 2, 'nombre' => 'Mariscal Luzuriaga', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'departamento_id' => 2, 'nombre' => 'Ocros', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'departamento_id' => 2, 'nombre' => 'Pallasca', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'departamento_id' => 2, 'nombre' => 'Pomabamba', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'departamento_id' => 2, 'nombre' => 'Recuay', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'departamento_id' => 2, 'nombre' => 'Santa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'departamento_id' => 2, 'nombre' => 'Sihuas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'departamento_id' => 2, 'nombre' => 'Yungay', 'created_at' => now(), 'updated_at' => now()],

            // APURÍMAC (3)
            ['id' => 25, 'departamento_id' => 3, 'nombre' => 'Abancay', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'departamento_id' => 3, 'nombre' => 'Andahuaylas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'departamento_id' => 3, 'nombre' => 'Antabamba', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'departamento_id' => 3, 'nombre' => 'Aymaraes', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'departamento_id' => 3, 'nombre' => 'Cotabambas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'departamento_id' => 3, 'nombre' => 'Chincheros', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'departamento_id' => 3, 'nombre' => 'Grau', 'created_at' => now(), 'updated_at' => now()],

            // AREQUIPA (4)
            ['id' => 32, 'departamento_id' => 4, 'nombre' => 'Arequipa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'departamento_id' => 4, 'nombre' => 'Camaná', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 34, 'departamento_id' => 4, 'nombre' => 'Caravelí', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35, 'departamento_id' => 4, 'nombre' => 'Castilla', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 36, 'departamento_id' => 4, 'nombre' => 'Caylloma', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 37, 'departamento_id' => 4, 'nombre' => 'Condesuyos', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 38, 'departamento_id' => 4, 'nombre' => 'Islay', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 39, 'departamento_id' => 4, 'nombre' => 'La Unión', 'created_at' => now(), 'updated_at' => now()],

            // AYACUCHO (5)
            ['id' => 40, 'departamento_id' => 5, 'nombre' => 'Huamanga', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 41, 'departamento_id' => 5, 'nombre' => 'Cangallo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 42, 'departamento_id' => 5, 'nombre' => 'Huanca Sancos', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 43, 'departamento_id' => 5, 'nombre' => 'Huanta', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 44, 'departamento_id' => 5, 'nombre' => 'La Mar', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 45, 'departamento_id' => 5, 'nombre' => 'Lucanas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 46, 'departamento_id' => 5, 'nombre' => 'Parinacochas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 47, 'departamento_id' => 5, 'nombre' => 'Páucar del Sara Sara', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 48, 'departamento_id' => 5, 'nombre' => 'Sucre', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 49, 'departamento_id' => 5, 'nombre' => 'Víctor Fajardo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 50, 'departamento_id' => 5, 'nombre' => 'Vilcas Huamán', 'created_at' => now(), 'updated_at' => now()],

                // LIMA (departamento_id = 15)
            [
                'id' => 51,
                'departamento_id' => 15,
                'nombre' => 'Lima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 52,
                'departamento_id' => 15,
                'nombre' => 'Barranca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 53,
                'departamento_id' => 15,
                'nombre' => 'Cajatambo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 54,
                'departamento_id' => 15,
                'nombre' => 'Canta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 55,
                'departamento_id' => 15,
                'nombre' => 'Cañete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 56,
                'departamento_id' => 15,
                'nombre' => 'Huaral',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 57,
                'departamento_id' => 15,
                'nombre' => 'Huarochirí',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 58,
                'departamento_id' => 15,
                'nombre' => 'Huaura',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 59,
                'departamento_id' => 15,
                'nombre' => 'Oyón',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 60,
                'departamento_id' => 15,
                'nombre' => 'Yauyos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
