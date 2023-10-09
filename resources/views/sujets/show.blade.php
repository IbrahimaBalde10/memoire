<x-app-layout>
   <br><br><br>
    <br>
     <div class="card px-6 mx-5 ">
        <div class="card-header choisir text-white text-uppercase">
             <h1 class="card-title ">Information du sujet</h1>
        </div>
        <div class="card-body">
           
            <p class="card-text">
             <strong class="font-monospace pe-2">Origine du sujet :</strong>L' {{$sujet->user->role}}  {{$sujet->user->name}} <br><br>
             <strong class="font-monospace pe-5">Libellé du sujet:</strong> {{ $sujet->libelle }} <br><br>
            <strong class="font-monospace pe-5">  Résumé du sujet: </strong>{{ $sujet->resume }}
            </p>
        </div>
     </div><br>
    
</x-app-layout>