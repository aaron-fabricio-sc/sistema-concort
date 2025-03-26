<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Envio;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($project_id)
    {
        //

        $envios = Envio::where("project_id", $project_id)->get();
        $project = Project::find($project_id);

        return view('admin.envios.index', compact('envios', 'project', 'project_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($project_id)
    {
        //
        $articles = Article::where("status", '1')->pluck("nombre", 'id');



        return view('admin.envios.create', compact('project_id', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'project_id' => 'required',
            'article_id' => 'required',
            'cantidad' => 'required',

        ]);


        $article = Article::find($request->article_id);
        $project = Project::find($request->project_id);

        $precio =  $article->precio_unitario;
        $cantidad = $article->cantidad_actual;

        if ($cantidad < $request->cantidad) {
            return redirect()->route('admin.projects.index')->with('message', 'No hay suficiente cantidad de material en el inventario.');
        }

        $envio = new Envio();


        $envio->project_id = $request->project_id;
        $envio->article_id = $request->article_id;
        $envio->cantidad = $request->cantidad;
        $envio->monto = $request->cantidad * $precio;

        $envio->save();
        $project->cantidad_total_materiales += $request->cantidad;
        $project->cantidad_total_precio += $envio->monto;
        $project->save();

        $article->cantidad_actual -= $request->cantidad;
        $article->valor_total = $article->cantidad_actual * $article->precio_unitario;
        $article->save();

        return redirect()->route('admin.projects.index')->with('message', 'Envio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Envio $envio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Envio $envio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Envio $envio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function pdfList($project_id)
    {

        $project = Project::find($project_id);




        $envios = Envio::where("project_id", $project_id)->get();


        $pdf = Pdf::loadView('admin.envios.pdf.pdf', compact("envios", "project"));
        return $pdf->stream();
    }
}
