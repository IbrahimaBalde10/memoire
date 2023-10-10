<x-app-layout>
    <br><br><br><br>
        <!--  -->
        <div class="container">
              @if(session()->has('info'))
            <div class="alert alert-success" role="alert">
                {{session('info')}}
            </div>
            @endif
   
    <!-- <div class="card"> -->

        <!-- <div class="card-content"> -->
           
            <div class="content flex flex-col sm:justify-center items-center">
                <table class="table table-hover">
                  <nav class="aaa px-4 my-2 navbar text-align-center text-uppercase text-light 
                     bg-"    >Choix à évaluer</nav>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Etudiant</th>
                            <th>Professeur</th>
                            <th>Sujet</th>
                            <th>Statut</th>
                            <th>Actions1</th>
                            <th>Actions2</th>
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
                               
                                <!-- <td><a class="btn btn-success" href="{{ route('choix.show', $choix->id) }}">En attente</a></td> -->
                               
                                <td><form action="{{ route('choix.valideChoix', $choix) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-outline-success bg-success text-light">Valider</button>
                                </form></td>
                                <td><a class="btn btn-danger" href="{{ route('choix.show', $choix->id) }}">Rejeter</a></td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    </div> 
    
</x-app-layout>