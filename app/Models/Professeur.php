<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\PropositionSujet;
use App\Models\Sujet;
use App\Models\User;
use App\Models\FicheSuivie;
use App\Models\Memoire;


class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Clé étrangère vers users
        // Autres champs spécifiques aux professeurs
    ];

    public function sujetsProfesseur()
    {
             return $this->hasMeny(Sujet::class, 'professeur_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    
    public function propositionsSujets()
{
    return $this->hasMany('App\Models\PropositionSujet', 'professeur_id');
}

  public function fichesSuivis()
    {
        return $this->hasMany(FicheSuivi::class);
    }

    //  public function memoire()
    // {
    //     return $this->hasMany(Memoire::class);
    // }
}