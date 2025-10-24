<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('negocios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('categoria_negocio_id')->constrained('categoria_negocios')->cascadeOnDelete();
            $table->foreignId('departamento_id')->constrained('departamentos')->cascadeOnDelete();
            $table->foreignId('provincia_id')->constrained('provincias')->cascadeOnDelete();
            $table->foreignId('distrito_id')->constrained('distritos')->cascadeOnDelete();

            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('historia')->nullable();
            //Direccion de correo
            $table->string('correo',255)->unique();
            $table->string('telefono',20)->nullable();
            $table->string('ubicacion',255)->nullable();
            $table->string('imagen',255)->nullable();
            $table->enum('estado',['activo','inactivo'])->default('activo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negocios');
    }
};
