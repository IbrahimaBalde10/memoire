<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FicheSuivie;
use App\Models\Commentaire;

class CommentaireController extends Controller
{

      // afficher la liste des commentaires 
    //   public function index()
    // {   
    //      $commentaires = Commentaire::all();
    //      return view('commentaires.create', compact('commentaires'));
    // }
    // afficher le formulaire pour effectuer un commentaire
     public function create(FicheSuivie $ficheSuivie)
    {
        $ficheSuiviId= $ficheSuivie->id;
        $commentaires = Commentaire::where('fiche_suivie_id', $ficheSuiviId)->get();
//  $sujets = $query->where('is_valide', true)->oldest('libelle')->paginate(5);
        return view('commentaires.create', compact('ficheSuivie','commentaires'));
    }

      // soumettre le commentaire
    public function store(Request $request)
    {
          $this->validate($request, [
            'user_id' =>'required',
            'fiche_suivie_id' =>'required',
            'contenu' =>'required',
            
        ]);
       
        $commentaire = Commentaire::create($request->all());
        $commentaire->save();

        return back()->with('info', 'Commentaire ajouté');
    }


}
