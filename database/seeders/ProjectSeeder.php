<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Project::create([
            'nombre_empresa' => 'Empresa Ejemplo',
            'nombre_proyecto' => 'Proyecto Ejemplo',
            'descripcion' => 'Descripción del proyecto ejemplo.',
            'fecha_inicio' => '2025-02-15',
            'fecha_fin' => '2025-12-31',
            'estado' => 'En progreso',
            'cantidad_total_materiales' => 0,
            'cantidad_total_precio' => 0.00, // Cambiado a decimal
            'presupuesto_inicial' => 10000,
        ]);

        // Puedes agregar más registros si lo deseas
        Project::create([
            'nombre_empresa' => 'Otra Empresa',
            'nombre_proyecto' => 'Otro Proyecto',
            'descripcion' => 'Descripción de otro proyecto.',
            'fecha_inicio' => '2025-03-01',
            'fecha_fin' => '2025-11-30',
            'estado' => 'Completado',
            'cantidad_total_materiales' => 0,
            'cantidad_total_precio' => 0.00, // Cambiado a decimal
            'presupuesto_inicial' => 5000,
        ]);
    }
}
