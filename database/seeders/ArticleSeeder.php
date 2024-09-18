<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*  $table->string("nombre")->nullable();
        $table->longText("descripcion")->nullable();
        $table->string("cod")->nullable();
        $table->integer("cantidad_inicial")->nullable();
        $table->integer("cantidad_actual")->nullable();
        $table->string("precio_unitario")->nullable();
        $table->string("valor_total")->nullable();






        $table->unsignedBigInteger('group_id')->nullable();

        $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null')->onUpdate('cascade');
        $table->tinyInteger("status")->default(1); */
        $article1 = new Article();
        $article1->nombre = 'Cemento';
        $article1->descripcion = 'Material de construcción hecho a base de cemento, arena y gravas o piedras.';
        $article1->cod = '001';
        $article1->cantidad_inicial = 100;
        $article1->cantidad_actual = 100;
        $article1->precio_unitario = 10;
        $article1->valor_total = 1000;
        $article1->group_id = 1;
        $article1->status = 1;
        $article1->save();
    }
}
