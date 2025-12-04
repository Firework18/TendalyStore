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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();

            $table->string('codigo')->unique();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('negocio_id')->constrained('negocios')->cascadeOnDelete();
            
            $table->enum('tipo_entrega',['delivery','recojo'])->default('delivery');
            $table->decimal('costo_envio',10,2)->default(0);
            $table->string('direccion_entrega')->nullable();
            $table->string('referencia')->nullable();
            $table->string('telefono')->nullable();

            $table->decimal('total',10,2);
            $table->enum('estado',['pendiente','pagado','en camino','entregado','rechazado'])->default('pendiente');
            $table->string('imagen_pago')->nullable();

            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
