<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Detail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $details = Detail::all();

        return view('admin.details.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $articles = Article::where("status", '1')->pluck("nombre", 'id');
        return view('admin.details.create', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $request->validate([
            'article_id' => 'required',
            'cantidad' => 'required',
            'detalle' => 'required',
        ]);

        $article = Article::findOrFail($request->article_id);

        if ($request->cantidad > $article->cantidad_actual) {
            return redirect()->route("admin.details.create")->with("message", "No hay suficiente stock");
        }

        $article->cantidad_actual = $article->cantidad_actual - $request->cantidad;

        $article->valor_total = $article->cantidad_actual * $article->precio_unitario;

        $article->save();



        Detail::create($request->all());
        return redirect()->route("admin.details.index")->with("message", "Se registro correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Detail $detail)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        //
    }

    public function pdfList()
    {


        $actives = Detail::all();

        // $settings = Settings::find(1);
        $pdf = Pdf::loadView('admin.details.pdf.pdf', compact("actives"));
        return $pdf->stream();
    }
}
