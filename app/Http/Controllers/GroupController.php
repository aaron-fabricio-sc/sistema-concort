<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $dataGroup = Group::where("status", 1)->OrderBy("id", "desc")->get();




        return view('admin.groups.index', compact("dataGroup"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //



        return view("admin.groups.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            "name" => "required",
            "description" => "required"
        ]);

        $group = Group::create($request->all());

        return redirect()->route("admin.groups.index")->with("message", "Se creo el Grupo.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //


        return view("admin.groups.edit", compact("group"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            "name" => "required",

            "description" => "required",

        ]);

        $group->update($request->all());
        return redirect()->route("admin.groups.index")->with("message", "Se actualizó correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }

    public function inactive()
    {
        $dataGroup = Group::where("status", 0)->OrderBy("id", "desc")->get();
        return view('admin.groups.inactive', compact("dataGroup"));
    }

    public function activate($id)
    {

        $dataGroup = Group::find($id);
        $dataGroup->status = 1;
        $dataGroup->save();

        return redirect()->route("admin.groups.index")->with("message", "Se reestablecio el Grupo.");
    }

    public function viewConfirmDelete($id)
    {
        $dataGroup = Group::find($id);


        return view("admin.groups.confirmDelete", compact("dataGroup"));
    }
    public function inactivate($id)
    {
        $group = Group::find($id);

        $group->status = 0;
        $group->save();
        return redirect()->route("admin.groups.index")->with("message-danger", "Se inhabilito el Grupo.");
    }
}
