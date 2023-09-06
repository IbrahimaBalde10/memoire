<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sujet;
use App\Models\Etudiant;
use App\Models\Professeur;


class ZchoisirSujet extends Model
{
    use HasFactory;

       protected $fillable = ['etudiant_id','professeur_id','sujet_id','statut'];

//     // gestion des choix

// public function etudiant()
// {
//     return $this->hasOne(User::class, 'etudiant_id');
// }

// public function professeur()
// {
//     return $this->belongsTo(User::class, 'professeur_id');
// }

// les fonction etudiant et professeur permettent de lier les etudiants 
// et professeurs à leur choixau lieu d'afficher leurs identifiants on afficher leurs names
public function etudiant()
{
    return $this->belongsTo(Etudiant::class, 'etudiant_id');
}

public function professeur()
{
    return $this->belongsTo(Professeur::class, 'professeur_id');
}
 
// methode affichant les infos d'un sujet deja choisis
public function sujet()
{
    return $this->belongsTo(Sujet::class, 'sujet_id');
}

// Tester si un choix est validé/pas
  public function estValide()
    {
        return $this->is_statut;
    }
    
}
