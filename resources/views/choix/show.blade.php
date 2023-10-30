<x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Infos choix') }}
        </h2>
   
    </x-slot>

    <!-- <div class="card">
        <div class="card-content"> -->
    
    <div class="card px-6 py-2 mx-5 ">
        <div class="card-header choisir text-white text-uppercase">
             <h1 class="card-title ">Information finales du choix de l'etudiant après validation</h1>
        </div>
        <div class="card-body">
           
            <p class="card-text">
            <strong class="font-monospace py-2 pe-">Etudiant:</strong> {{ $choix->etudiant->user->name}} <br><br>
             <strong class="font-monospace pe-">Origine du sujet :</strong> {{$choix->sujet->user->name}} <br><br>
             <strong class="font-monospace pe-">Libellé du sujet:</strong> {{ $choix->sujet->libelle }} <br><br>
            <strong class="font-monospace pe-">Résumé du sujet: </strong><br>{{ $choix->sujet->resume }}
         <br>   <br><strong class="font-monospace pe-">Encadreur:</strong> {{ $choix->professeur->user->name}} <br><br>
       
        </p>
       <div class="row">
         <p class="col-md-10"><strong>Vous pouvez commencé à travailler sur votre projet par 
            <a class="btn btn-info" href="#">ICI</a></strong></p>
         <p class=" col md-1  btn btn-primary">Imprimer</p><strong>MERCI !!!</strong>
         
       </div>
        </div>
     </div><br>
     <!--  -->
</x-app-layout>