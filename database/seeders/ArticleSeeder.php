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


        $article3 = new Article();
        $article3->nombre = 'Cemento Portland';
        $article3->tipo_medida = 'Bolsa 50kg';
        $article3->descripcion = 'Cemento Portland para uso general en obras civiles.';
        $article3->cod = '003';
        $article3->cantidad_inicial = 80;
        $article3->cantidad_actual = 80;
        $article3->precio_unitario = 55;
        $article3->valor_total = 4400;
        $article3->group_id = 2; // Hormigón
        $article3->status = 1;
        $article3->save();

        $article4 = new Article();
        $article4->nombre = 'Grava 3/4';
        $article4->tipo_medida = 'Metro cúbico';
        $article4->descripcion = 'Gravilla de 3/4 usada para concretos estructurales.';
        $article4->cod = '004';
        $article4->cantidad_inicial = 50;
        $article4->cantidad_actual = 50;
        $article4->precio_unitario = 110;
        $article4->valor_total = 5500;
        $article4->group_id = 2;
        $article4->status = 1;
        $article4->save();

        $article5 = new Article();
        $article5->nombre = 'Fierro corrugado 3/8"';
        $article5->tipo_medida = 'Barra';
        $article5->descripcion = 'Barra de acero corrugado para refuerzo estructural.';
        $article5->cod = '005';
        $article5->cantidad_inicial = 200;
        $article5->cantidad_actual = 200;
        $article5->precio_unitario = 25;
        $article5->valor_total = 5000;
        $article5->group_id = 4; // Acero
        $article5->status = 1;
        $article5->save();

        $article6 = new Article();
        $article6->nombre = 'Fierro corrugado 1/2"';
        $article6->tipo_medida = 'Barra';
        $article6->descripcion = 'Barra de acero corrugado para zapatas y vigas.';
        $article6->cod = '006';
        $article6->cantidad_inicial = 150;
        $article6->cantidad_actual = 150;
        $article6->precio_unitario = 32;
        $article6->valor_total = 4800;
        $article6->group_id = 4;
        $article6->status = 1;
        $article6->save();

        $article7 = new Article();
        $article7->nombre = 'Ladrillo hueco 6 huecos';
        $article7->tipo_medida = 'Unidad';
        $article7->descripcion = 'Ladrillo de arcilla para muros de albañilería.';
        $article7->cod = '007';
        $article7->cantidad_inicial = 1000;
        $article7->cantidad_actual = 1000;
        $article7->precio_unitario = 2.5;
        $article7->valor_total = 2500;
        $article7->group_id = 6; // Mampostería
        $article7->status = 1;
        $article7->save();

        $article8 = new Article();
        $article8->nombre = 'Bloque de cemento 15x20x40';
        $article8->tipo_medida = 'Unidad';
        $article8->descripcion = 'Bloques de hormigón para construcción de muros estructurales.';
        $article8->cod = '008';
        $article8->cantidad_inicial = 800;
        $article8->cantidad_actual = 800;
        $article8->precio_unitario = 4.2;
        $article8->valor_total = 3360;
        $article8->group_id = 6;
        $article8->status = 1;
        $article8->save();

        $article9 = new Article();
        $article9->nombre = 'Tubería PVC 1/2"';
        $article9->tipo_medida = 'Metro';
        $article9->descripcion = 'Tubería de PVC para instalaciones de agua potable.';
        $article9->cod = '009';
        $article9->cantidad_inicial = 300;
        $article9->cantidad_actual = 300;
        $article9->precio_unitario = 6;
        $article9->valor_total = 1800;
        $article9->group_id = 7; // Sanitarias
        $article9->status = 1;
        $article9->save();

        $article10 = new Article();
        $article10->nombre = 'Codo PVC 1/2"';
        $article10->tipo_medida = 'Unidad';
        $article10->descripcion = 'Accesorio sanitario de PVC para desvíos en tuberías.';
        $article10->cod = '010';
        $article10->cantidad_inicial = 200;
        $article10->cantidad_actual = 200;
        $article10->precio_unitario = 1.5;
        $article10->valor_total = 300;
        $article10->group_id = 7;
        $article10->status = 1;
        $article10->save();

        $article11 = new Article();
        $article11->nombre = 'Cable THHN 12 AWG';
        $article11->tipo_medida = 'Metro';
        $article11->descripcion = 'Cable eléctrico THHN para instalaciones internas.';
        $article11->cod = '011';
        $article11->cantidad_inicial = 500;
        $article11->cantidad_actual = 500;
        $article11->precio_unitario = 8;
        $article11->valor_total = 4000;
        $article11->group_id = 8; // Eléctricas
        $article11->status = 1;
        $article11->save();

        $article12 = new Article();
        $article12->nombre = 'Tubo conduit 1"';
        $article12->tipo_medida = 'Metro';
        $article12->descripcion = 'Tubo conduit para protección de cableado eléctrico.';
        $article12->cod = '012';
        $article12->cantidad_inicial = 200;
        $article12->cantidad_actual = 200;
        $article12->precio_unitario = 7;
        $article12->valor_total = 1400;
        $article12->group_id = 8;
        $article12->status = 1;
        $article12->save();
    }
}
