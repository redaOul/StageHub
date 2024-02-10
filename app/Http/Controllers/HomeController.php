<?php

namespace App\Http\Controllers;

use App\Models\Framework;
use App\Models\Projet;
use App\Models\Stage;
use App\Models\Technologie;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Project;

class HomeController extends Controller
{
    public function __invoke() {
        $nbDemande = Demande::where('etat', '=', 'traitement')->count();
        $nbProjet = Project::all()
            ->count();
        $nbStagiaire = Demande::where('etat', '=', 'execution')->count();
        return view('admin.home')
            ->with('nbDemande', $nbDemande)
            ->with('nbProjet', $nbProjet)
            ->with('nbStagiaire', $nbStagiaire);
    }
}
