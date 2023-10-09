<x-app-layout> 
    <br><br><br>
        <div class="flex flex-col sm:justify-center items-center ">
            @if(session()->has('info'))
            <div class="alert alert-success" role="alert">
                {{session('info')}}
            </div>
            @endif
                <table class="table table-hover">
                 <nav class="aaa px-4 navbar text-align-center text-uppercase text-light 
                     bg-"    >Tous les choix validés</nav><br>
                    <thead>
                        <tr class="fw-bold">
                            <th>Id</th>
                            <th>Etudiant</th>
                            <th>Professeur</th>
                            <th>Sujet</th>
                            <th>Statut</th>
                       

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
                              
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              <!-- <div class=""> 
                <p class="d-flex-end ">{{$choixs->links()}}</p>
            </div>  -->
            </div>
          
</x-app-layout>