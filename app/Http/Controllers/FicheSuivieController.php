<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sujet;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\ZchoisirSujet;
use App\Models\FicheSuivie;

class FicheSuivieController extends Controller
{
        public function index($name = null)
{
  
    $ficheSuivies = FicheSuivie::all();
    
    return view('ficheSuivie.index', compact('ficheSuivies'));

}
    // afficher le formulaire
    public function create(ZchoisirSujet $choix)
    {
        
        return view('ficheSuivie.create', compact('choix'));
    }

       // soumettre son choix
    public function store(Request $request)
    { 
         $this->validate($request, [
            'etudiant_id' =>'required',
            'professeur_id' =>'required',
            'sujet_id' =>'required',
            'titre' =>'required',
            'description' =>'required',
            
        ]);
        $ficheSuivie = FicheSuivie::create($request->all());
       
        $ficheSuivie->save();

       
        return redirect()->route('choix.mesChoix')->with('info', 'La fiche est créé avec succès');

    }

}
