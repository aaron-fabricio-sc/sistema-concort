<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Envio;
use App\Models\Project;
use App\Models\purchasingDetails;
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
        // Buscar el proyecto; si no existe, redirigir o abortar
        $project = Project::find($project_id);
        if (!$project) {
            return redirect()->back()->with('error', 'Proyecto no encontrado.');
        }

        // Verificar que el proyecto tenga un kardex asociado
        if (!$project->kardex) {
            // Puedes devolver una vista vacía, un mensaje o un select vacío
            $articles = collect(); // colección vacía
            return view('admin.envios.create', compact('project_id', 'articles'));
        }

        $kardexId = $project->kardex->id;

        // Obtener los purchasingDetails del kardex
        $purchasingDetails = PurchasingDetails::where('kardex_id', $kardexId)->get();

        // Extraer los article_id únicos como array
        $articleIds = $purchasingDetails->pluck('article_id')->filter()->unique()->toArray();

        // Si no hay artículos asociados, devolvemos una colección vacía para el select
        if (empty($articleIds)) {
            $articles = collect();
            return view('admin.envios.create', compact('project_id', 'articles'));
        }

        // Obtener los artículos activos cuyos ids están en $articleIds
        // y devolver un array id => nombre (para usar en Form::select)
        $articles = \App\Models\Article::where('status', 1)
            ->whereIn('id', $articleIds)
            ->pluck('nombre', 'id');

        // Finalmente, mostramos la vista con los datos
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
            return redirect()->route('admin.projects.index')->with('message-danger', 'No hay suficiente cantidad de material en el inventario.');
        }

        $envio = new Envio();


        $envio->project_id = $request->project_id;
        $envio->article_id = $request->article_id;
        $envio->cantidad = $request->cantidad;
        $envio->monto = $request->cantidad * $precio;
        $envio->kardex_id = $project->kardex->id;


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
