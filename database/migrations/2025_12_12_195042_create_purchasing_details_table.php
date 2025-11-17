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
        Schema::create('purchasing_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id')->nullable();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('set null')->onUpdate('cascade');

            $table->integer("cantidad")->nullable();
            $table->decimal("precio_unitario", 15, 2)->nullable();

            $table->decimal('precio_total', 15, 2)->nullable(); // Cambiado a decimal para montos de dinero

            $table->unsignedBigInteger('kardex_id')->nullable();
            $table->foreign('kardex_id')->references('id')->on('kardexes')->onDelete('set null')->onUpdate('cascade');
            $table->string("proveedor")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasing_details');
    }
};
