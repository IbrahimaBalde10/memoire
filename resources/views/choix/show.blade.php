<x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Infos choix') }}
        </h2>
   
    </x-slot>
<br>
    <div class="card">
        <div class="card-content">
           
        <div class="content flex flex-col sm:justify-center items-center">
            <p>Informations finales de votre choix <a  class="btn btn-info"vhref="#">Imprimez</a></p> <br>
            <div class="card container-fluid ">

      <table class="table table-hover ">
                    <thead class="">
                        <tr class="text-center  table-success">
                            <th>Id</th>
                            <th>Etudiant</th>
                            <th>Encadreur</th>
                            <th>Libelle</th>
                            <th>Resumé</th>
                            <th>Provenance</th>
                        </tr>
                    </thead>
                    <tbody class="fw-lighter">
                            <tr>
                                <td>{{ $choix->id }}</td>
                                <td><strong>{{ $choix->etudiant->user->name}}</strong></td>
                                <td><strong>{{ $choix->professeur->user->name }}</strong></td>
                                <td><strong>{{ $choix->sujet->libelle }}</strong></td> 
                                 <td><strong>{{ $choix->sujet->resume }}</strong></td>
                                <td><strong>{{ $choix->sujet->user->name }}</strong></td> 
                               
                            </tr>
                      
                    </tbody>
                </table>
    </div>
            </div>
           
        </div>
    </div>
</x-app-layout>