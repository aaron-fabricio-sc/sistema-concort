<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $group1 = new Group();
        $group1->name = 'Trazado y replanteo General';
        $group1->description = 'Grupo de materiales que se utilizan para realizar el trazado y replanteo de una obra.';
        $group1->status = 1;
        $group1->save();

        $group2 = new Group();
        $group2->name = 'Hormigon pobre P/ base de zapatas';
        $group2->description = 'Material de construcción hecho a base de cemento, arena y gravas o piedras.';
        $group2->status = 1;
        $group2->save();

        $group3 = new Group();
        $group3->name = 'Zapata de Hº Aº H21';
        $group3->description = 'Material de construcción hecho a base de cemento, arena y gravas o piedras.';
        $group3->status = 1;
        $group3->save();
        $group4 = new Group();
        $group4->name = 'Acero de Refuerzo';
        $group4->description = 'Grupo de materiales usados para refuerzo estructural, como barras corrugadas y mallas electrosoldadas.';
        $group4->status = 1;
        $group4->save();

        $group5 = new Group();
        $group5->name = 'Cimientos y Encofrados';
        $group5->description = 'Materiales necesarios para la construcción de cimientos y la instalación de encofrados temporales.';
        $group5->status = 1;
        $group5->save();

        $group6 = new Group();
        $group6->name = 'Mampostería y Albañilería';
        $group6->description = 'Grupo de insumos usados para muros, tabiques, ladrillos, bloques y morteros.';
        $group6->status = 1;
        $group6->save();

        $group7 = new Group();
        $group7->name = 'Instalaciones Sanitarias';
        $group7->description = 'Materiales utilizados para la instalación de tuberías, accesorios y sistemas de agua y desagüe.';
        $group7->status = 1;
        $group7->save();

        $group8 = new Group();
        $group8->name = 'Instalaciones Eléctricas';
        $group8->description = 'Insumos destinados a la instalación de cables, tableros, tuberías eléctricas y dispositivos de protección.';
        $group8->status = 1;
        $group8->save();
    }
}
