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
                                <td><strong>{{ $choix->etudiant_id }}</strong></td>
                                <td><strong>{{ $choix->professeur_id }}</strong></td> 
                                <td><strong>{{ $choix->sujet_id }}</strong></td> 
                                  @if ($choix->statut === 1)
                                <td><strong>{{ 'Validé' }}</strong></td>
                                @else
                                <td><strong>{{ 'Non validé' }}</strong></td>
                                @endif
                               
                                  @if(auth()->user()->role === 'etudiant')
                                <td><a class="btn btn-success" href="{{ route('choix.index', $choix->id) }}">Resultats</a></td>
                                @endif
                                 @if(auth()->user()->role === 'professeur')
                                <td> <form action="{{ route('choix.valider', $choix) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-outline-success bg-success text-light">Valider</button>
                                </form></td>
                                <!-- <td><a class="btn btn-success" href="{{ route('choix.index', $choix->id) }}">Valider</a></td> -->
                                <td><a class="btn btn-danger" href="{{ route('choix.index', $choix->id) }}">Rejeter</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</x-app-layout>