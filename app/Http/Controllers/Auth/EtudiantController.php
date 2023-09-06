<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use Auth;

class EtudiantController extends Controller
{
    //
      public function create(Request $request)
{
        $etudiant = new Etudiant();
        $etudiant->user_id = Auth::user()->id;
        // Assignez d'autres valeurs aux champs spécifiques aux etudiants
        $etudiant->save();

     return redirect('/etudiant')->with('success', 'Profil étudiant créé avec succès !');

}
}