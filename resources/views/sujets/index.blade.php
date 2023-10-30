<x-app-layout> 
    <!-- <link rel="stylesheet" href=""> -->
      <!-- --> <br><br>

        <div class="container-fluid">
        <br>
    <header class=" card-header row">
        <div class="select col-md-8">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('sujets.index') }}" @unless($name) selected @endunless>Rechercher un sujet par filière</option>
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
            
    
    @if(session()->has('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
    @endif
        <div class="container-fluid flex flex-col sm:justify-center items-center ">
              <!-- <caption>Liste des sujets</caption> -->
                <table class="container-fluid table table-hover"><br>
                     <nav class="fs-6 fw-medium aaa px-4 mx-4 navbar text-sm-end text-uppercase text-light 
                     bg-"    >Liste des sujets</nav>
                     <!-- width: 78em;  >Liste des sujets</nav> -->
                    
                   <br>
                    <thead>
                        <tr class="fw-bold">
                            <th>Id</th>
                            <th>Libelle</th>
                            <th>Mot-Clés</th>
                            <!-- <th>Résumé</th> -->
                            <th>Provenance</th>
                            <!-- <th>Professeur</th> -->
                            <!-- <th>Statut</th> -->
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
                                 <!-- <td><strong>{{ $sujet->resume }}</strong></td> -->
                                <td><strong>{{ $sujet->user->name }}</strong></td>
                                <!-- <td><strong>Mr {{ $sujet->professeur->user->name }}</strong></td> -->
                               
                                <!-- @if ($sujet->is_valide === 1)
                                <td><strong>{{ 'Validé' }}</strong></td>
                                @else
                                <td><strong>{{ 'Non validé' }}</strong></td>
                                @endif -->
                                <td><a class="btn btn-info  text-sm text-light-600" href="{{ route('sujets.show', $sujet->id) }}">Voir</a></td>
                                @if(auth()->user()->role === 'etudiant')
                                     <!-- <td><a class="btn btn-success" href="{{ route('choix.create', $sujet->id) }}">Choisir</a></td> -->
                                          <td><a class="btn btn-primary choisir" href="{{ route('choix.create',['sujet' => $sujet->id] ) }}">Choisir</a></td>

                                @endif
                            </tr>
                            
                        @endforeach
                    </tbody>
                    
                </table>
                <div class="align-self-end">
                    <x-nav-link class="" :href="route('sujets.create')" :active="request()->routeIs('sujets.create')">
                       <button class="btn btn-success ">
                         {{ __('+ Proposer un sujet') }}
                       </button>
                    </x-nav-link>
                    
                </div>
                <p class="d-flex-end ">{{$sujets->links()}}</p>
            </div>
            
             <div class=""> 
                <!-- <p class="d-flex-end ">{{$sujets->links()}}</p> -->
            </div> 
              

</x-app-layout>