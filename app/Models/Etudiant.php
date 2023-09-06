<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\PropositionSujet;
use App\Models\User;
use App\Models\FicheSuivie;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Clé étrangère vers users
        // Autres champs spécifiques aux étudiants
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propositionsSujets()
{
    return $this->hasMany('App\Models\PropositionSujet');
}

  public function fichesSuivis()
    {
        return $this->hasMany(FicheSuivi::class);
    }
}