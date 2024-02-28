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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_vuelo')->unique();
            $table->foreignId('aeropuerto_salida_id')->constrained('aeropuertos');
            $table->foreignId('aeropuerto_llegada_id')->constrained('aeropuertos');
            $table->timestamp('salida');
            $table->timestamp('llegada');
            $table->integer('plazas');
            $table->decimal('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
