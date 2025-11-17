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
        Schema::create('envios', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_id')->nullable();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null')->onUpdate('cascade');


            $table->unsignedBigInteger('article_id')->nullable();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('set null')->onUpdate('cascade');


            $table->integer('cantidad')->nullable();


            $table->decimal('monto')->nullable();

            $table->unsignedBigInteger('kardex_id')->nullable();
            $table->foreign('kardex_id')->references('id')->on('kardexes')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
