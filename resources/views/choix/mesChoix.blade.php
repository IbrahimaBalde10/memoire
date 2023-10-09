<x-app-layout>
    <br><br><br><br>
        <!--  -->
        <div class="container">
              @if(session()->has('info'))
            <div class="alert alert-success" role="alert">
                {{session('info')}}
            </div>
            @endif
         @foreach($choixs as $choix)
            <div class="container-fluid p-5 card">
                <h3 class="card-title"><strong>Espace de travail</strong></h3>
                 @if ($choix->statut === 1)
                      <p>Votre choix a été validé </p> <br>
                <div class="card-body row">
                    
                     
                        <p class="col-md-3"><a class="btn btn-info text-white" href="{{ route('choix.show', $choix->id) }}">Resultat de mon choix</a></p>
                        <p class="col-md-3"><a class="btn btn-primary" href="{{ route('ficheSuivie.create', ['choix' => $choix->id])}}">Créer fiche de suivi</a></p>
                          <?php $idEtudiant = auth()->user()->etudiant->id; ?>
                       <p class="col-md-3"><a class="btn btn-primary" href="{{ route('ficheSuivie.show1', $idEtudiant)}}">Etat d'anacement</a></p>      
                        <?php $idEtudiant = auth()->user()->etudiant->id; ?>
                        <p class="col-md-3"><a class="btn btn-success" href="{{ route('memoires.create', ['choix' => $choix->id])}}">Soumettre mémoire</a></td>

                        @else
                        <p>Etat de mon choix : <a class="btn btn-success" href="{{ route('choix.show', $choix->id) }}">En attente</a></p>
                        @endif


                       



            @endforeach
                </div>
            </div><br>
        </div>

    
</x-app-layout>