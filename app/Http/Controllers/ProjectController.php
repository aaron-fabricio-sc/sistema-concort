<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
}
