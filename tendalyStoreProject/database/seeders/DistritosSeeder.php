<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistritosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("Distritos")->delete();

        DB::table("Distritos")->insert([
            ['id' => 1, 'provincia_id' => 51, 'nombre' => 'Cercado de Lima', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'provincia_id' => 51, 'nombre' => 'Ate', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'provincia_id' => 51, 'nombre' => 'Barranco', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'provincia_id' => 51, 'nombre' => 'Breña', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'provincia_id' => 51, 'nombre' => 'Comas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'provincia_id' => 51, 'nombre' => 'Chorrillos', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'provincia_id' => 51, 'nombre' => 'El Agustino', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'provincia_id' => 51, 'nombre' => 'Jesús María', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'provincia_id' => 51, 'nombre' => 'La Molina', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'provincia_id' => 51, 'nombre' => 'La Victoria', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'provincia_id' => 51, 'nombre' => 'Lince', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'provincia_id' => 51, 'nombre' => 'Magdalena del Mar', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'provincia_id' => 51, 'nombre' => 'Miraflores', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'provincia_id' => 51, 'nombre' => 'Pueblo Libre', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'provincia_id' => 51, 'nombre' => 'Puente Piedra', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'provincia_id' => 51, 'nombre' => 'Rímac', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'provincia_id' => 51, 'nombre' => 'San Isidro', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'provincia_id' => 51, 'nombre' => 'Independencia', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'provincia_id' => 51, 'nombre' => 'San Juan de Miraflores', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'provincia_id' => 51, 'nombre' => 'San Luis', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'provincia_id' => 51, 'nombre' => 'San Martín de Porres', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'provincia_id' => 51, 'nombre' => 'San Miguel', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'provincia_id' => 51, 'nombre' => 'Santiago de Surco', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'provincia_id' => 51, 'nombre' => 'Surquillo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'provincia_id' => 51, 'nombre' => 'Villa María del Triunfo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'provincia_id' => 51, 'nombre' => 'San Juan de Lurigancho', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'provincia_id' => 51, 'nombre' => 'Santa Rosa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'provincia_id' => 51, 'nombre' => 'Los Olivos', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'provincia_id' => 51, 'nombre' => 'San Borja', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'provincia_id' => 51, 'nombre' => 'Villa El Salvador', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'provincia_id' => 51, 'nombre' => 'Santa Anita', 'created_at' => now(), 'updated_at' => now()],
            // Área rural
            ['id' => 32, 'provincia_id' => 51, 'nombre' => 'Ancón', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'provincia_id' => 51, 'nombre' => 'Pucusana', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 34, 'provincia_id' => 51, 'nombre' => 'Punta Hermosa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35, 'provincia_id' => 51, 'nombre' => 'Punta Negra', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 36, 'provincia_id' => 51, 'nombre' => 'San Bartolo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 37, 'provincia_id' => 51, 'nombre' => 'Santa María del Mar', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 38, 'provincia_id' => 51, 'nombre' => 'Chaclacayo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 39, 'provincia_id' => 51, 'nombre' => 'Cieneguilla', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 40, 'provincia_id' => 51, 'nombre' => 'Lurigancho', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 41, 'provincia_id' => 51, 'nombre' => 'Lurín', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 42, 'provincia_id' => 51, 'nombre' => 'Pachacámac', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 43, 'provincia_id' => 51, 'nombre' => 'San Andrés de Tupicocha', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
