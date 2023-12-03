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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); 
            $table->text('descripcion')->nullable(); 
            $table->string('idioma')->default('Español'); 
            $table->enum('nivel', ['Principiante', 'Intermedio', 'Avanzado']);
            $table->string('profesor'); 
            $table->string('correo'); 
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
