<x-app-layout> 
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des sujets') }}
        </h2>
        <div class=""> <br>
        <br>
    <header class="card-header row">
        <div class="select col-md-8">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('sujets.index') }}" @unless($name) selected @endunless>Toutes filieres confondues</option>
                @foreach($filieres as $filiere)
                    <option value="{{ route('sujets.filiere', $filiere->name) }}" {{ $name == $filiere->name ? 'selected' : '' }}>{{ $filiere->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
          
            <div class="container-fluid">
                <form action="" class="d-flex">
                    <input placeholder="Entrez votre mot clé" aria-label="search" class="form-control me-2 border border-1">
                    <button class="btn btn-success">Rechercher</button>
                 
                </form>
            </div>
        </div>
    </header>
</div>
    </x-slot>
    @if(session()->has('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
    @endif
        <div class="flex flex-col sm:justify-center items-center ">
                <table class="table table-hover">
                    <thead>
                        <tr class="fw-bold">
                            <th>Id</th>
                            <th>Libelle</th>
                            <th>Mot-Clés</th>
                            <th>Provenance</th>
                            <!-- <th>Professeur</th> -->
                            <th>Statut</th>
                            <th>Actions</th>
                            @if(auth()->user()->role === 'etudiant')
                            <th>Choix</th>
                            @endif
                            
                        </tr>
                    </thead>
                    <tbody class="fw-lighter">
                        @foreach($sujets as $sujet)
                            <tr>
                                <td>{{ $sujet->id }}</td>
                                <td><strong>{{ $sujet->libelle }}</strong></td>
                                <td><strong>{{ $sujet->motCle }}</strong></td>
                                <!-- <td><strong>{{ $sujet->user_id }}</strong></td> -->
                                <td><strong>{{ $sujet->user->name }}</strong></td>
                               
                                @if ($sujet->estValide())
                                <td><strong>{{ 'Validé' }}</strong></td>
                                @else
                                <td><strong>{{ 'Non validé' }}</strong></td>
                                @endif
                                <td><a class="btn btn-info  text-sm text-gray-600" href="{{ route('sujets.show', $sujet->id) }}">Voir</a></td>
                                @if(auth()->user()->role === 'etudiant')
                                     <!-- <td><a class="btn btn-success" href="{{ route('choix.create', $sujet->id) }}">Choisir</a></td> -->
                                          <td><a class="btn btn-success" href="{{ route('choix.create',['sujet' => $sujet->id] ) }}">Choisir</a></td>

                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
             <div class=""> 
                <p class="d-flex-end ">{{$sujets->links()}}</p>
            </div> 

</x-app-layout>