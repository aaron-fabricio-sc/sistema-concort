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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("nombre")->nullable();
            $table->longText("descripcion")->nullable();
            $table->string("cod")->nullable()->unique();
            $table->integer("cantidad_inicial")->nullable();
            $table->integer("cantidad_actual")->nullable();
            $table->decimal("precio_unitario", 15, 2)->nullable();
            $table->decimal("valor_total", 15, 2)->nullable();






            $table->unsignedBigInteger('group_id')->nullable();

            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null')->onUpdate('cascade');
            $table->tinyInteger("status")->default(1);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
