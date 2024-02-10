<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;
use Illuminate\Support\Facades\Auth;

class DomaineController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $domaines = Domaine::all();
        return view('admin.domaine')
            ->with('domaines', $domaines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $domaine = new Domaine;

        $domaine->titre = $request->input('titre');
        $domaine->user_id = auth()->id();

        $domaine->save();

        return redirect('/domaines');
    }

    // Display the specified resource.
    public function show(Domaine $module)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(Domaine $module)
    {
        //
    }

    // Update the specified resource in storage.
    public function update(Request $request, Domaine $module)
    {
        //
    }

    // Remove the specified resource from storage.
    public function destroy(Domaine $domaine)
    {
        $temp = Domaine::find($domaine->id);
        $temp->delete();
        return redirect('/domaines');
    }
}
