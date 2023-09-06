<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use App\Models\{Sujet, Filiere,Professeur,Etudiant};


class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index($name = null)
{
    $query = $name ? Filiere::whereName($name)->firstOrFail()->sujets() : Sujet::query();
    $sujets = $query->where('is_valide', true)->oldest('libelle')->paginate(5);
//    $professeurs = User::where('role', 'professeur')->get();
    // $sujets = Sujet::all();
    $filieres = Filiere::all();
    
    return view('sujets.index', compact('sujets', 'filieres', 'name'));

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $filieres = Filiere::all();
        
         $professeurs = Professeur::all();
         return view('sujets.create', compact('filieres','professeurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'libelle' =>'required',
            'resume' =>'required',
            'motCle' =>'required',
            'user_id' =>'required',
            'professeur_id' =>'required',
            'is_valide' =>'required',
            
        ]);
     $sujet = Sujet::create($request->all());
          // Si l'utilisateur est un professeur, alors le sujet est validé (is_valide = true)
    if (auth()->user()->role === 'professeur') {
        $sujet->is_valide = true;
    }
    elseif(auth()->user()->role === 'etudiant') {
        $sujet->is_valide = false;
    }
       
      
        $sujet->filieres()->attach($request->cats);
        $sujet->save();

        return redirect()->route('sujets.index')->with('info', 'Le sujet a bien été ajouté dans la base de données');

    }


    public function show(Sujet $sujet)
    {
        return view('sujets.show', compact('sujet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // afficher tous les sujets à valider par un prof donné
     public function indexPrSujet()
        {
            $professeur = auth()->user()->professeur->id;
            $sujets = Sujet::where('professeur_id', $professeur)
                         ->where('is_valide', false)
                         ->paginate(5);
      
            return view('sujets.indexPrSujet', compact('sujets'));
        }


    
        // valide un sujet
        public function validerSujet(Sujet $sujet)
        {
            $sujet->update(['is_valide' => true]);

            return redirect()->route('sujets.index')->with('info', 'Le sujet a été validé avec succès !');
        }



}
