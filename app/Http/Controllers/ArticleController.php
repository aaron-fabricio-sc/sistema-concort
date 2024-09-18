<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $dataArticle = Article::where("status", 1)->OrderBy("id", "desc")->get();

        return view('admin.articles.index', compact("dataArticle"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $group = Group::where("status", '1')->pluck("name", 'id');



        return view('admin.articles.create', compact("group"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //



        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'cod' => 'required',
            'cantidad_inicial' => 'required',
            'precio_unitario' => 'required',
            'group_id' => 'required',
        ]);

        try {
            $article = new Article();
            $article->nombre = $request->nombre;
            $article->descripcion = $request->descripcion;
            $article->cod = $request->cod;
            $article->cantidad_inicial = $request->cantidad_inicial;
            $article->cantidad_actual = $request->cantidad_inicial; // Corrige el nombre del campo
            $article->precio_unitario = $request->precio_unitario;

            $total = $request->cantidad_inicial * $request->precio_unitario;
            $article->valor_total = $total;
            $article->group_id = $request->group_id;

            $article->save();

            return redirect()->route("admin.articles.index")->with("message", "Se creó el Artículo correctamente");
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route("admin.articles.create")->with("message-danger", "El código del artículo ya existe.");
            }
            // Manejar otras excepciones si es necesario
            return redirect()->route("admin.articles.create")->with("message-danger", "El código del artículo ya existe.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
