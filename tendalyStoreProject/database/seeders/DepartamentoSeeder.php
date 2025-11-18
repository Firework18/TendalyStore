<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    public function run()
    {
        DB::table('departamentos')->delete();

        DB::table('departamentos')->insert([
            ['id' => 1, 'nombre' => 'Amazonas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nombre' => 'Áncash', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nombre' => 'Apurímac', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nombre' => 'Arequipa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nombre' => 'Ayacucho', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'nombre' => 'Cajamarca', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'nombre' => 'Callao', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'nombre' => 'Cusco', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'nombre' => 'Huancavelica', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'nombre' => 'Huánuco', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'nombre' => 'Ica', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'nombre' => 'Junín', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'nombre' => 'La Libertad', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'nombre' => 'Lambayeque', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'nombre' => 'Lima', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'nombre' => 'Loreto', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'nombre' => 'Madre de Dios', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'nombre' => 'Moquegua', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'nombre' => 'Pasco', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'nombre' => 'Piura', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'nombre' => 'Puno', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'nombre' => 'San Martín', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'nombre' => 'Tacna', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'nombre' => 'Tumbes', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'nombre' => 'Ucayali', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
