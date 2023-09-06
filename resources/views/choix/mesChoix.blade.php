<x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Choix') }}
        </h2>
   
    </x-slot>

    <div class="card">
        <div class="card-content">
             @if(session()->has('info'))
            <div class="alert alert-success" role="alert">
                {{session('info')}}
            </div>
            @endif
            <div class="content flex flex-col sm:justify-center items-center">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Etudiant</th>
                            <th>Professeur</th>
                            <th>Sujet</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-lighter">
                        @foreach($choixs as $choix)
                            <tr>
                                <td>{{ $choix->id }}</td>
                                <td><strong>{{ $choix->etudiant->user->name}}</strong></td>
                                <td><strong>{{ $choix->professeur->user->name }}</strong></td>
                                <td><strong>{{ $choix->sujet_id }}</strong></td> 
                                @if ($choix->statut === 1)
                                <td><strong>{{ 'Validé' }}</strong></td>
                                @else
                                <td><strong>{{ 'Non validé' }}</strong></td>
                                @endif
                               
                                  @if(auth()->user()->role === 'etudiant')
                                      @if ($choix->statut === 1)
                                      <td><a class="btn btn-info" href="{{ route('choix.show', $choix->id) }}">Resultats</a></td>
                                      <td><a class="btn btn-success" href="{{ route('ficheSuivie.create', ['choix' => $choix->id])}}">Créer fiche de suivi</a></td>

                                      @else
                                <td><a class="btn btn-success" href="{{ route('choix.show', $choix->id) }}">En attente</a></td>
                                      @endif
                                  @endif
                                 @if(auth()->user()->role === 'professeur')
                                <td> <form action="{{ route('choix.valider', $choix) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-outline-success bg-success text-light">Valider</button>
                                </form></td>
                                <td><a class="btn btn-danger" href="{{ route('choix.show', $choix->id) }}">Rejeter</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
    <p>
        
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae totam quos hic praesentium, reprehenderit, inventore, consequuntur officia architecto recusandae quas
         ab molestiae itaque velit repellat quibusdam perferendis accusamus fuga voluptatibus.00
    </p>
</x-app-layout>