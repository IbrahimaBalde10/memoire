<x-app-layout> 
    @if(session()->has('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
    @endif
    <br><br><br><br>
        <div class="flex flex-col sm:justify-center items-center ">
                <table class="table table-hover">
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
                                <td><a class="btn btn-info" href="{{ route('ficheSuivie.show1', $choix->etudiant_id) }}">{{ $choix->etudiant->user->name}}</a></td>
                                <td><strong>{{ $choix->professeur->user->name}}</strong></td>
                                <td><strong>{{ $choix->sujet_id}}</strong></td>                                 
                                <td><strong>{{ $choix->statut}}</strong></td>   

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
             

</x-app-layout>