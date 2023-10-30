<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FicheSuivie;
use App\Models\Commentaire;
use App\Models\Memoire;
use App\Models\ZchoisirSujet;
// use App\Models\Sujet;
// use App\Models\Etudiant;
// use App\Models\Professeur;


class MemoireController extends Controller
{
        // afficher la liste des commentaires 
      public function index()
    {   
         $memoires = Memoire::where('statut', false)->get() ?? 'Aucun mémoire';
        // 
        // $sujet = App\Sujet::find(1); // Remplacez 1 par l'ID de votre sujet
        // $summary = $sujet->resume;
        // $words = str_word_count($summary, 1);
        // $first10Words = implode(' ', array_slice($words, 0, 10));
        // 
         return view('memoires.index', compact('memoires'));
    }

      // afficher le formulaire
    public function create(ZchoisirSujet $choix)
    {
        
        return view('memoires.create', compact('choix'));
    }

      // soumettre le commentaire
    public function store(Request $request)
    {
          $this->validate($request, [
            'etudiant_id' =>'required',
            'professeur_id' =>'required',
            'sujet_id' =>'required',
            'fichiepdf' =>'required|mimes:pdf',
            
        ]);

        // $memoire = Memoire::create($request->all());
        $memoire= new Memoire();
        
        $pdfFileName = time() . '_' . $request->file('fichiepdf')->getClientOriginalName();
       
        $pdfFile = $request->file('fichiepdf')->storeAs('memores' , $pdfFileName, 'public');

        $sujet_id = $request->input('sujet_id');
        $etudiant_id = $request->input('etudiant_id');
        $professeur_id = $request->input('professeur_id');

        $memoire->etudiant_id = $etudiant_id;
        $memoire->professeur_id = $professeur_id;
        $memoire->sujet_id = $sujet_id;
        $memoire->fichiepdf = $pdfFile;
        $memoire->statut = false;

        

        $memoire->save();

        return redirect()->route('memoires.index')->with('info', 'Memoire soumise avec succèe');

    }


     public function show(Memoire $memoire)
    {
        $pdfUrl = asset('storage/' .$memoire->fichiepdf);

        // $pdfUrl = asset('storage/app/public/' .$memoire->fichiepdf);
        return view('memoires.show', compact('pdfUrl'));
        // return view('memoires.show', compact('memoire'));
    }
}
