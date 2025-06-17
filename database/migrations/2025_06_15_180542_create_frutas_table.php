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
        Schema::create('frutas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');  // Campo requerido
            $table->string('color');   // Campo requerido
            $table->date('fecha_cosecha');  // Campo requerido
            $table->date('fecha_caducidad'); // Se calculará automáticamente
            $table->foreignId('categoria_id')->constrained(); // Relación con categorías
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frutas');
    }
};
