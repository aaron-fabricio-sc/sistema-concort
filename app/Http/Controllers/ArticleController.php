<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\Facade\Pdf;

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




        return view('admin.articles.show', compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //

        $group = Group::where("status", '1')->pluck("name", 'id');

        return view('admin.articles.edit', compact("article", "group"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
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

            return redirect()->route("admin.articles.index")->with("message", "Se actualizó el Artículo correctamente");
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route("admin.articles.edit", $article->id)->with("message-danger", "El código del artículo ya existe.");
            }
            // Manejar otras excepciones si es necesario
            return redirect()->route("admin.articles.edit", $article->id)->with("message-danger", "El código del artículo ya existe.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function viewConfirmDelete($id)
    {
        $article = Article::find($id);
        return view('admin.articles.confirmDelete', compact("article"));
    }
    public  function inactive()
    {
        $dataArticle = Article::where("status", 0)->OrderBy("id", "desc")->get();
        return view('admin.articles.inactive', compact("dataArticle"));
    }

    public function inactivate($id)
    {
        $article = Article::find($id);

        $article->status = 0;
        $article->save();
        return redirect()->route("admin.articles.index")->with("message-danger", "Se inhabilito el Artículo.");
    }

    public function activate($id)
    {

        $article = Article::find($id);
        $article->status = 1;
        $article->save();

        return redirect()->route("admin.articles.index")->with("message", "Se reestablecio el Artículo.");
    }

    public function pdfList()
    {


        $actives = Article::where('status', 1)->get();
        $inactives = Article::where('status', 0)->get();
        // $settings = Settings::find(1);
        $pdf = Pdf::loadView('admin.articles.pdf.pdf', compact("actives", "inactives"));
        return $pdf->stream();
    }
}
