<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZchoisirSujet extends Model
{
    use HasFactory;

       protected $fillable = ['etudiant_id','professeur_id','sujet_id','statut'];

//     // gestion des choix

public function etudiant()
{
    return $this->hasOne(User::class, 'etudiant_id');
}

public function professeur()
{
    return $this->belongsTo(User::class, 'professeur_id');
}

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
