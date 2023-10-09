<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Sujet;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Zchoix;
use App\Models\Memoire;
use App\Models\Commentaire;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

public function sujetsProfesseur()
    {
             return $this->hasMeny(Sujet::class, 'professeur_id');
    }

    
// public function sujetsProfesseur()
// {
//     return $this->hasMany(Sujet::class, 'user_id', 'id');
// }


    // gestion des choix
    // User.php
public function choix()
{
    return $this->hasMany(Zchoix::class, 'etudiant_id');
}


 public function sujets()
    {
        return $this->hasMany(Sujet::class);
    }

    //  public function memoire()
    // {
    //     return $this->hasMany(Memoire::class);
    // }

    public function etudiant()
    {
        return $this->hasOne(Etudiant::class);
    }

      public function professeur()
    {
        return $this->hasOne(Professeur::class);
    }

// les commentaires dun utilisateur
public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    

// public function sujetsProposesParEtudiants()
// {
//     return Sujet::whereHas('etudiant', function ($query) {
//         $query->where('professeur_id', $this->id);
//     })->get();
// }

}
