<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Kardex;
use App\Models\Project;
use App\Models\purchasingDetails;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KardexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataKardex = Kardex::withSum('purchasingDetails', 'precio_total')
            ->withSum('envios', 'monto')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.kardex.index', compact("dataKardex"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $project = Project::where("status", '1')->pluck("nombre_proyecto", 'id');



        return view('admin.kardex.create', compact("project"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $kardex = Kardex::create($request->all());

        return redirect()->route("admin.kardex.index")->with("message", "Se creo el Kardex.");
    }

    /**
     * Display the specified resource.
     */
    public function show(kardex $kardex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kardex $kardex)
    {
        //
        $project = Project::where("status", '1')->pluck("nombre_proyecto", 'id');
        return view("admin.kardex.edit", compact("kardex", "project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kardex $kardex)
    {
        //

        $kardex->update($request->all());
        return redirect()->route("admin.kardex.index")->with("message", "Se actualizó correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kardex $kardex)
    {
        //
    }
    public function inactive()
    {


        $dataKardex = Kardex::where("status", 0)->OrderBy("id", "desc")->get();
        return view('admin.kardex.inactive', compact("dataKardex"));
    }

    public function viewConfirmDelete($id)
    {
        $dataKardex = Kardex::find($id);


        return view("admin.kardex.confirmDelete", compact("dataKardex"));
    }
    public function inactivate($id)
    {
        $kardex = Kardex::find($id);

        $kardex->status = 0;
        $kardex->save();
        return redirect()->route("admin.kardex.index")->with("message-danger", "Se inhabilito el Kardex.");
    }

    public function activate($id)
    {

        $dataKardex = Kardex::find($id);
        $dataKardex->status = 1;
        $dataKardex->save();

        return redirect()->route("admin.kardex.index")->with("message", "Se reestablecio el Grupo.");
    }

    public function pdfIngresos($id)
    {


        $ingresos = purchasingDetails::where('kardex_id', $id)->get();
        $totalPrecio = PurchasingDetails::where('kardex_id', $id)->sum('precio_total');

        $kardex = Kardex::find($id);




        // $settings = Settings::find(1);
        $pdf = Pdf::loadView('admin.kardex.pdf.ingresos', compact("ingresos", "kardex", "totalPrecio"));
        return $pdf->stream();
    }

    public function pdfSalidas($id)
    {


        $salidas = Envio::where('kardex_id', $id)->get();
        $totalPrecio = Envio::where('kardex_id', $id)->sum('monto');

        $kardex = Kardex::find($id);


        // $settings = Settings::find(1);
        $pdf = Pdf::loadView('admin.kardex.pdf.salidas', compact("salidas", "kardex", "totalPrecio"));
        return $pdf->stream();
    }
}
