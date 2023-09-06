<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filiere;
use App\Models\ZchoisirSujet;
use App\Models\User;
use App\Models\Professeur;


class Sujet extends Model
{
    use HasFactory;
    protected $fillable = ['libelle', 'resume', 'motCle','user_id','professeur_id','is_valide'];


//     public function professeur()
// {
//     return $this->belongsTo('App\Models\Professeur');
// }
 public function professeurValideur()
    {
        return $this->belongsTo(User::class, 'professeur_id');
    }


    // public function professeur()
    // {
    //     return $this->belongsTo(User::class, 'professeur_id');
    // }

      public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'professeur_id');
    }


// Tester si un sujet est validé/pas
  public function estValide()
    {
        return $this->is_valide;
    }
    
public function filieres()
{
    return $this->belongsToMany(Filiere::class, 'filiere_sujet', 'sujet_id', 'filiere_id');
}

//gestion des choix

public function choix()
{
    return $this->hasMany(ZchoisirSujet::class, 'sujet_id');
}

 public function user()
    {
        return $this->belongsTo(User::class);
    }
}
