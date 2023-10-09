<x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Infos choix') }}
        </h2>
   
    </x-slot>
<br>
    <div class="card">
        <div class="card-content">
           
      
    
    <div class="card px-6 mx-5 ">
        <div class="card-header choisir text-white text-uppercase">
             <h1 class="card-title ">Choix de l'etudiant</h1>
        </div>
        <div class="card-body">
           
            <p class="card-text">
            <strong class="font-monospace py-2 pe-5"> Etudiant:</strong> {{ $choix->etudiant->user->name}} <br><br>
             <strong class="font-monospace pe-5">Encadreur:</strong> {{ $choix->professeur->user->name}} <br><br>
             <strong class="font-monospace pe-2">Origine du sujet :</strong> {{$choix->sujet->user->name}} <br><br>
             <strong class="font-monospace pe-5">Libellé du sujet:</strong> {{ $choix->sujet->libelle }} <br><br>
            <strong class="font-monospace pe-5">  Résumé du sujet: </strong>{{ $choix->sujet->resume }}
            </p>
        </div>
     </div><br>
     <!--  -->
</x-app-layout>