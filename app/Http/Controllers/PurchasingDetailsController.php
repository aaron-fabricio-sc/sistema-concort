<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\purchasingDetails;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PurchasingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(purchasingDetails $purchasingDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(purchasingDetails $purchasingDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, purchasingDetails $purchasingDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(purchasingDetails $purchasingDetails)
    {
        //
    }

    public function pdf($id)
    {


        $idArticle = $id;

        $article = Article::find($idArticle);

        $list = PurchasingDetails::where('article_id', $idArticle)->get();

        // $settings = Settings::find(1);
        $pdf = Pdf::loadView('admin.purchasingDetails.pdf.pdf', compact("list", "article"));
        return $pdf->stream();
    }
}
