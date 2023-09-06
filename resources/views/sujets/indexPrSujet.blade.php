<x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sujets à valider') }}
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
                            <th>Libelle</th>
                            <th>Mot-Clés</th>
                            <th>Provenance</th>
                            <!-- <th>Professeur</th> -->
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-lighter">
                        @foreach($sujets as $sujet)
                            <tr>
                                <td>{{ $sujet->id }}</td>
                                <td><strong>{{ $sujet->libelle }}</strong></td>
                                <td><strong>{{ $sujet->motCle }}</strong></td>
                                 <td><strong>{{ $sujet->user->name }}</strong></td>
                                 <!-- <td><strong>{{ $sujet->professeur_id }}</strong></td> -->
                                @if ($sujet->is_valide === 1)
                                <td><strong>{{ 'Validé' }}</strong></td>
                                @else
                                <td><strong>{{ 'Non validé' }}</strong></td>
                                @endif
                                <td><a class="btn btn-info" href="{{ route('sujets.show', $sujet->id) }}">Voir</a></td>
                               <td> <form action="{{ route('sujets.valider', $sujet) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-outline-success bg-success text-light">Valider</button>
                                </form></td>

                                <td><a class="btn btn-primary" href="#">Reformuler</a></td>
                                <td><a class="btn btn-danger" href="#">Rejeter</a></td>

                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</x-app-layout>