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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->string('imagen')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('informacion')->nullable();
            $table->string('telefono',9)->nullable();
            $table->string('direccion',50)->nullable();
            $table->boolean('tiene_negocio')->default(false);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'apellido_paterno',
                'apellido_materno',
                'informacion',
                'telefono',
                'direccion',
                'tiene_negocio',
            ]);
            
            
        });
    }
};
