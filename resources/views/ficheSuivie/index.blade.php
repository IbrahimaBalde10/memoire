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
                        </tr>
                    </thead>
                    <tbody class="fw-lighter">
                        @foreach($ficheSuivies as $ficheSuivie)
                            <tr>
                                <td>{{ $ficheSuivie->id }}</td>
                                <td><strong>{{ $ficheSuivie->etudiant_id }}</strong></td>
                                <td><strong>{{ $ficheSuivie->professeur_id}}</strong></td>
                                <td><strong>{{ $ficheSuivie->sujet_id}}</strong></td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</x-app-layout>