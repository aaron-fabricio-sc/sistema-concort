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
        $article1->nombre = 'Alambre de amarre';
        $article1->tipo_medida = 'Kilogramo';
        $article1->descripcion = 'Material de alambre de acero para amarrar estructuras de concreto.';
        $article1->cod = '001';
        $article1->cantidad_inicial = 100;
        $article1->cantidad_actual = 100;
        $article1->precio_unitario = 10;
        $article1->valor_total = 1000;
        $article1->group_id = 1;
        $article1->status = 1;
        $article1->save();


        $article2 = new Article();
        $article2->nombre = 'Arena común';
        $article2->tipo_medida = 'Metro cúbico';
        $article2->descripcion = 'Arena común para mezclas de concreto.';
        $article2->cod = '002';
        $article2->cantidad_inicial = 100;
        $article2->cantidad_actual = 100;
        $article2->precio_unitario = 90;
        $article2->valor_total = 9000;
        $article2->group_id = 2;
        $article2->status = 1;
        $article2->save();
    }
}
