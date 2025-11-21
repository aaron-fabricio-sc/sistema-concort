<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Kardex;
use App\Models\Project;
use App\Models\purchasingDetails;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::OrderBy("id", "desc")->where("status", 1)->get();




        return view('admin.projects.index', compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //




        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_empresa' => 'required',
            'nombre_proyecto' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',

        ]);

        Project::create($request->all());

        return redirect()->route('admin.projects.index')->with('message', 'Proyecto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        $estados = [
            'Iniciado' => 'Iniciado',
            'En progreso' => 'En progreso',
            'Completado' => 'Completado',
        ];

        return view("admin.projects.edit", compact("project", "estados"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $request->validate([
            'nombre_empresa' => 'required',
            'nombre_proyecto' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'estado' => 'required',
        ]);

        $project->update($request->all());

        return redirect()->route('admin.projects.index')->with('message', 'Proyecto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
    public function inactivate($id)
    {
        $project = Project::find($id);

        $project->status = 0;
        $project->save();
        return redirect()->route("admin.projects.index")->with("message-danger", "Se inhabilito el Proyecto.");
    }
    public function activate($id)
    {
        $project = Project::find($id);

        $project->status = 1;
        $project->save();
        return redirect()->route("admin.projects.index")->with("message", "Se hábilito el Proyecto.");
    }
    public function inactive()
    {
        $projects = Project::where("status", 0)->OrderBy("id", "desc")->get();
        return view('admin.projects.inactive', compact("projects"));
    }

    public function viewConfirmDelete($id)
    {
        $project = Project::find($id);


        return view("admin.projects.confirmDelete", compact("project"));
    }

    public function pdfList()
    {


        $actives = Project::where('status', 1)->get();
        $inactives = Project::where('status', 0)->get();
        // $settings = Settings::find(1);

        $pdf = Pdf::loadView('admin.projects.pdf.pdfList', compact("actives", "inactives"));
        return $pdf->stream();
    }

    public function pdfKardex(Project $project)
    {

        if (!isset($project->kardex)) {
            return redirect()->route("admin.projects.index")->with("message-danger", "El proyecto no tiene un Kardex.");
        }

        $ingresos = purchasingDetails::where('kardex_id', $project->kardex->id)->get();
        $totalPrecioIngresos = PurchasingDetails::where('kardex_id', $project->kardex->id)->sum('precio_total');


        $salidas = Envio::where('kardex_id', $project->kardex->id)->get();
        $totalPrecioSalidas = Envio::where('kardex_id', $project->kardex->id)->sum('monto');
        $kardex = Kardex::find($project->kardex->id);

        $saldo = $totalPrecioIngresos - $totalPrecioSalidas;
        $diferenciaPresupuesto = $project->presupuesto_inicial - $totalPrecioSalidas;




        $pdf = Pdf::loadView('admin.projects.pdf.kardex', compact("ingresos", "totalPrecioIngresos", "salidas", "totalPrecioSalidas", "kardex", "saldo", "project", "diferenciaPresupuesto"));
        return $pdf->stream();
    }
}
