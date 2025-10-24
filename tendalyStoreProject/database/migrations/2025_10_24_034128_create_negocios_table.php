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
            $table->string('direccion');
            $table->string('telefono',20)->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('estado')->default('activo');

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
