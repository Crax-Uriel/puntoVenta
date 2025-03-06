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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table-> string('codigo_producto',100)->unique();
            $table-> string('nombre_producto',150);
            $table-> string('descripcion_producto',200);
            $table-> text('imagen')->nullable();
            $table-> integer('stock_producto');
            $table-> integer('stock_minimo_producto');
            $table-> integer('stock_maximo_producto');
            $table-> decimal('costo_producto',8,2);
            $table-> decimal('precio_producto',8,2);
            $table-> date('fecha_ingreso_producto');

            $table-> unsignedBigInteger('categoria_id'); 
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
