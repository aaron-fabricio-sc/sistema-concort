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
            'nombre_empresa' => 'Constructora Hernández S.R.L.',
            'nombre_proyecto' => 'Edificio Residencial Los Álamos',
            'descripcion' => 'Construcción de un edificio de 6 pisos con departamentos familiares en la zona Sur.',
            'fecha_inicio' => '2025-01-20',
            'fecha_fin' => '2026-02-28',
            'estado' => 'En progreso',
            'cantidad_total_materiales' => 0,
            'cantidad_total_precio' => 0.00,
            'presupuesto_inicial' => 850000, // presupuesto realista
        ]);

        Project::create([
            'nombre_empresa' => 'Ingeniería y Servicios La Paz',
            'nombre_proyecto' => 'Mejoramiento de Vías Urbanas',
            'descripcion' => 'Proyecto de pavimentación y ensanchamiento de calles principales en zona central.',
            'fecha_inicio' => '2024-07-10',
            'fecha_fin' => '2025-03-15',
            'estado' => 'Completado',
            'cantidad_total_materiales' => 0,
            'cantidad_total_precio' => 0.00,
            'presupuesto_inicial' => 420000,
        ]);
    }
}
