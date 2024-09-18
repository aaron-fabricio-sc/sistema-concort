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
        $group1->name = 'Hormigón';
        $group1->description = 'Material de construcción hecho a base de cemento, arena y gravas o piedras.';
        $group1->status = 1;
        $group1->save();

        $group2 = new Group();
        $group2->name = 'Acero de refuerzo';
        $group2->description = 'Grupo de barras de acero que se utilizan en la construcción de estructuras de hormigón armado.';
        $group2->status = 1;
        $group2->save();

        $group3 = new Group();
        $group3->name = 'Madera';
        $group3->description = 'Material orgánico que se obtiene de los árboles y arbustos.';
        $group3->status = 1;
        $group3->save();

        $group4 = new Group();
        $group4->name = 'Bloques y ladrillos';
        $group4->description = 'Elementos de construcción que se utilizan para levantar muros y paredes.';
        $group4->status = 1;
        $group4->save();
    }
}
