<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ZchoisirSujet;
use App\Models\Sujet;
use App\Models\Etudiant;
use App\Models\Professeur;

class ZchoisirSujetController extends Controller
{
    // afficher la liste des choix
      public function index()
    {   
        //  $choixs = ZchoisirSujet::all();
         $choixs = ZchoisirSujet::where('statut', true)->oldest('id')->paginate(5);
         return view('choix.index', compact('choixs'));
    }

    // afficher le formulaire pour termine le choix
     public function create(Sujet $sujet)
    {
       
        $professeurs = Professeur::all();
        //  $professeurs = User::where('role', 'professeur')->get();
        return view('choix.create', compact('professeurs','sujet'));
    }
   

    // soumettre son choix
    public function store(Request $request)
    {
       
        // $sujet_id=$request->input('sujet_id');
        // $etudiant_id=$request->input('etudiant_id');
        // $professeur_id=$request->input('professeur_id');
        
        // $this->validate($request, [
        //     'etudiant_id' =>'required',
        //     'professeur_id' =>'required',
        //     'sujet_id' =>'required',
        //     'statut' =>'required',
            
        // ]);
        
        $choix = ZchoisirSujet::create($request->all());
        $choix->statut = false;
        $choix->save();

       
        return redirect()->route('choix.index')->with('info', 'Votre choix est terminé, veuillez plus tard pour la verification');

    }

    // afficher mon/mes choix
        public function indexMesChoix()
    {    
        if(auth()->user()->role === 'etudiant'){
        $idEtudiant = auth()->user()->etudiant->id;

        $choixs = ZchoisirSujet::where('etudiant_id', $idEtudiant)
                                ->get();
        return view('choix.mesChoix', compact('choixs','idEtudiant'));
        }
    
        elseif(auth()->user()->role === 'professeur'){
        $idProfesseur = auth()->user()->professeur->id;

        $choixs = ZchoisirSujet::where('professeur_id', $idProfesseur)
                                ->get()
                                ->where('statut', false);
        return view('choix.mesChoix', compact('choixs','idProfesseur'));

        }
      
    }

     // les choix à valider par un prof
    public function choixValide(ZchoisirSujet $choix)
    {
         $idProfesseur = auth()->user()->professeur->id;

        $choixs = ZchoisirSujet::where('professeur_id', $idProfesseur)
                                ->get()
                                ->where('statut', false);
        return view('choix.choixValide', compact('choixs','idProfesseur'));

        // return redirect()->route('choix.choixValide')->with('info', 'Le choix a été validé avec succès !');
    }

      public function valideChoix(ZchoisirSujet $choix)
    {
        $choix->update(['statut' => true]);

        return redirect()->route('choix.choixValide')->with('info', 'Le choix a été validé avec succès !');
    }

    // afficher les infos d'un choix
       public function show(ZchoisirSujet $choix)
    {
        return view('choix.show', compact('choix'));
    }

     // afficher mes etudiants mesEtudiants
      public function mesEtudiants()
    {
        //  $choixs = ZchoisirSujet::where('statut', true)->oldest('id')->paginate(5);

        $idProf= auth()->user()->professeur->id;
        $choixs = ZchoisirSujet::where('professeur_id', $idProf )->get()
         ->where('statut', true);;
        return view('choix.mesEtudiants', compact('choixs'));
        
        // return view('ficheSuivie.mesEtudiants1', compact('idProf'));

    }

}
