<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'etablissement',
        'date_debut_stage',
        'date_fin_stage',
        'cv',
        'lettre_motivation',
        'demande_stage',
        'etat',
        'user_id',
        'project_id',
        'domaine_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }
}
