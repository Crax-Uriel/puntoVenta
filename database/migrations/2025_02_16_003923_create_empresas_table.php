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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa',150);
            $table->string('tipo_empresa',100);
            $table->string('pais',150);
            $table->string('rfc',20)->unique();
            $table->string('telefono',15);
            $table->string('correo',15)->unique();
            $table->integer('cantidad_impuesto');
            $table->string('nombre_impuesto',25);
            $table->string('moneda',40);
            $table->string('direccion',250);
            $table->string('ciudad',200);
            $table->string('codigo_postal',50);
            $table->text('logo',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
