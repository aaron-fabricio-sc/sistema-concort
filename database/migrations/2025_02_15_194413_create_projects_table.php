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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa')->nullable();
            $table->string('nombre_proyecto')->nullable();
            $table->string('descripcion')->nullable();

            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string("estado")->nullable()->default('Iniciado');
            $table->integer('cantidad_total_materiales')->nullable()->default(0);
            $table->decimal('cantidad_total_precio')->nullable()->default(0.00);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
