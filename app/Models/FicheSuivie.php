<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sujet;
use App\Models\Etudiant;
use App\Models\Professeur;


class FicheSuivie extends Model
{
    use HasFactory;

     protected $fillable = ['etudiant_id','professeur_id','sujet_id','titre','description','fichiepdf'];

       public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

     public function sujet()
    {
        return $this->belongsTo(Sujet::class);
    }





}
