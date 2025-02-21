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
        $projects = Project::OrderBy("id", "desc")->get();




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

        return redirect()->route('admin.projects.index')
            ->with('message', 'Proyecto creado exitosamente.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }

    public function inactive()
    {
        $dataGroup = Project::where("status", 0)->OrderBy("id", "desc")->get();
        return view('admin.groups.inactive', compact("dataGroup"));
    }

    public function viewConfirmDelete($id)
    {
        $project = Project::find($id);


        return view("admin.groups.confirmDelete", compact("project"));
    }
}
