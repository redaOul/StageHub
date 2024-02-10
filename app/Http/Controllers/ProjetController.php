<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Project::all();
        return view('admin.projets')
            ->with('projets', $projets);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        //
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $projet = new Project;

        $projet->titre = $request->input('titre');
        $projet->description = $request->input('description');
        $projet->framework = $request->input('technologie1');
        $projet->user_id = auth()->id();

        $projet->save();

        return redirect('/projets');
    }

    // Display the specified resource.
    public function show(Project $projet)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(Project $projet)
    {
        //
    }

    // Update the specified resource in storage.
    public function update(Request $request, Project $projet)
    {
        //
    }

    // Remove the specified resource from storage.
    public function destroy(Project $projet)
    {
        $projet->delete();
        return redirect('/projets');
    }
}
