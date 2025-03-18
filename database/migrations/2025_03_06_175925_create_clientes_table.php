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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente',50);
            $table->string('apellido_paterno_cliente',80);
            $table->string('apellido_materno_cliente',80);
            $table->string('rfc',20)->nullable();
            $table->string('telefono_cliente',12)->nullable();
            $table->string('correo_electronico',200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
