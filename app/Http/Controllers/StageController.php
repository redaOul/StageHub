<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function index() {
        $stages = Demande::where('etat', 'execution')
            ->orWhere('etat', 'succes')
            ->join('users as u', 'demandes.user_id', '=', 'u.id')
            ->join('domaines as dm', 'demandes.domaine_id', '=', 'dm.id')
            ->join('projects as prj', 'demandes.project_id', '=', 'prj.id')
            ->select('u.name', 'prj.titre as prjTitre', 'dm.titre as dmTitre', 'demandes.date_fin_stage', 'demandes.etat')
            ->get();

        return view('admin.stage')->with('stages', $stages);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        //
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    // Display the specified resource.
    public function show(Demande $demande)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(Demande $demande)
    {
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request, Demande $demande)
    {
        //
    }

    // Remove the specified resource from storage.
    public function destroy(Demande $demande)
    {
        //
    }
}
