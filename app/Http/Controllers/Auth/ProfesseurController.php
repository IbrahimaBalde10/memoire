<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;
use Auth;
use App\Models\User; // Importer le modèle User

class ProfesseurController extends Controller
{
    public function create(Request $request)
{
        $professeur = new Professeur();
        $professeur->user_id = Auth::user()->id;
        // Assignez d'autres valeurs aux champs spécifiques aux étudiants
        $professeur->save();

        return redirect('/professeur')->with('success', 'Profil Professeur créé avec succès !');

}
}
