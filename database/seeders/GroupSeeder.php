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
    }
}
