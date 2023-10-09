<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Sujet;

class Memoire extends Model
{
    use HasFactory;
    protected $fillable = ['etudiant_id','professeur_id','sujet_id','fichiepdf', 'statut'];


     // les fonction etudiant et professeur permettent de lier les etudiants 
// et professeurs à leurs memoires lieu d'afficher leurs identifiants on afficher leurs names
public function etudiant()
{
    return $this->belongsTo(Etudiant::class, 'etudiant_id');
}

public function professeur()
{
    return $this->belongsTo(Professeur::class, 'professeur_id');
}

public function sujet()
{
    return $this->belongsTo(Sujet::class, 'sujet_id');
}
}
