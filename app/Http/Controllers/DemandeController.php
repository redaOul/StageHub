<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Domaine;
use Illuminate\Http\Request;

class DemandeController extends Controller {
    public function getDemandes(){
        $demandes = Demande::where('etat', 'traitement')
            ->join('users as u', 'demandes.user_id', '=', 'u.id')
            ->join('domaines as dm', 'demandes.domaine_id', '=', 'dm.id')
            ->select('demandes.*', 'u.name', 'u.email', 'dm.titre')
            ->get();
        return $demandes;
    }

    public function getDemande($id){
        if ($id != -1) {
            $demande = Demande::where('demandes.id', $id)
            ->where('etat', 'traitement')
            ->join('users as u', 'demandes.user_id', '=', 'u.id')
            ->join('domaines as dm', 'demandes.domaine_id', '=', 'dm.id')
            ->select('demandes.*', 'u.name', 'u.email', 'dm.titre')
            ->first();
        } else {
            $demande = new Demande();
            $demande->etablissement = "";
            $demande->date_debut_stage = "";
            $demande->date_fin_stage = "";
            $demande->cv = "";
            $demande->lettre_motivation = "";
            $demande->demande_stage = "";
            $demande->etat = "";
            $demande->user_id = "";
            $demande->project_id = "";
            $demande->domaine_id = "";
            $demande->name = "";
            $demande->email = "";
            $demande->doamine = "";
        }
        return $demande;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        if (empty($search)) {
            $demandes = $this->getDemandes();

        } else {
            $option = $request->input('option');
            $valeur = $request->input('search');
            $tragetedColumn = ($option == 'name') ? 'u'.'.'.$option : 'demandes'.'.'.$option ;

            $demandes = Demande::where($tragetedColumn, $valeur)
            ->where('etat', 'traitement')
            ->join('users as u', 'demandes.user_id', '=', 'u.id')
            ->join('domaines as dm', 'demandes.domaine_id', '=', 'dm.id')
            ->select('demandes.*', 'u.name', 'u.email', 'dm.titre')
            ->get();
        }

        $demande = $this->getDemande(-1);
        return view('admin.demande')
            ->with('demandes', $demandes)
            ->with('demande', $demande)
            ->with('hidden', 'hidden');
    }

    // Show the form for creating a new resource.
    public function create(){}

    // Store a newly created resource in storage.
    public function store(Request $request){
        try {
            if ($request->hasFile('file')) {
                $ext = ['-cv.pdf', '-lm.pdf', '-ds.pdf'];
                $path = ['cv', 'lettreMotivation', 'demandeStage'];
                $i = 0;
                foreach ($request->file as $key => $doc) {
                    $fileName[$i++] = $request->input('user_id') . uniqid() . date('d-m-Y_H-i-s') . $ext[$key];
                    $doc->move(public_path('uploads/' . $path[$key]), $fileName[$i-1]);
                }
            }
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
        $demande = new Demande();

        $demande->etablissement = $request->input('etablissement');
        $demande->date_debut_stage = $request->input('date_debut_stage');
        $demande->date_fin_stage = $request->input('date_fin_stage');
        $demande->cv = $path[0] . "/" . $fileName[0];
        $demande->lettre_motivation =$path[1] . '/' . $fileName[1];
        $demande->demande_stage = $path[2] . '/' .  $fileName[2];
        $demande->etat = $request->input('etat');
        $demande->user_id = $request->input('user_id');
        $demande->domaine_id = $request->input('domaine_id');
        try {
            $demande->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect('/');
        
    }

    // Display the specified resource.
    public function show(int $id, Request $request) {
        $demande = Demande::find($id);

        if ($demande) {
            $hidden = '';
            $demande = $this->getDemande($demande->id);
        } else {
            $hidden = 'hidden';
        }
        $demandes = $this->getDemandes();
        return view('admin.demande')
            ->with('demandes', $demandes)
            ->with('demande', $demande)
            ->with('search', '')
            ->with('hidden', $hidden);
    }

    // Show the form for editing the specified resource.
    public function edit(Demande $demande){}

    // Update the specified resource in storage.
    public function update(Request $request, Demande $demande){
        $demande = Demande::find($demande->id);
        if ($demande) {
            $demande->update([
                'project_id' => $request->input('projet'),
                'etat' => 'execution',
           ]);
            $demande->refresh();
        }
        return redirect('/stage');
    }

    // Remove the specified resource from storage.
    public function destroy(Demande $demande) {
        $demande = Demande::find($demande->id);
        if ($demande) {
            $demande->update(['etat' => 'refuse']);
            $demande->refresh();
        }
        return redirect('/demande');
    }
}
