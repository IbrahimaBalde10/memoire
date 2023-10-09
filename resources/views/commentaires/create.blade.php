<x-app-layout  > 
     <!-- <x-slot name="header"> -->
    @if(session()->has('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
    @endif
    <br><br>
<!-- </x-slot> -->
   <div class="ccccc">

   
    <div class="card">
        <div class="card-header">
             <h1 class="card-title"><strong class="text-primary"> {{ $ficheSuivie->titre }}</strong></h1>
        </div>
        <div class="card-body">
           
            <p class="card-text">{{ $ficheSuivie->description }}.</p>
            <p class="card-text align-self-center justify-content-center ">{{ $ficheSuivie->created_at->format('d-m-y')}} </p>
        </div>
     </div> 
    <br>
<div>
    
       <!-- <form method="POST" action="{{ route('commentaires.store') }}" style="width: 700px;" 
  class="position-absolute top-50 start-30   ms-5 me-1" fill="#212529"> -->
   <form method="POST" action="{{ route('commentaires.store') }}" 
  class="" >
        @csrf

        <!-- commentaires -->
         <div>
            <x-input-label for="commentaire" :value="__('Commentaire')" />
            <textarea placeholder="Veuillez entrer votre commentaire"  id="commentaire" class="block mt-1 w-full" name="contenu" required autofocus autocomplete="commentaire">{{ old('commentaire') }}</textarea>
            <x-input-error :messages="$errors->get('commentaire')" class="mt-2" />
        </div>
        <!-- id user  -->
         <div class="mt-4">
         <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        </div>

          <!-- id user  -->
         <div class="mt-4">
         <input type="hidden" name="fiche_suivie_id"  value="{{ $ficheSuivie->id }}">
        </div>

       
          <!-- button -->
        <div class="flex items-center justify-center my-2 mt-4">
            <x-primary-button class="ml-4">
                {{ __('Commenter') }}
            </x-primary-button>
        </div>
    </form>
    
</div>

<!-- affichons les commentaires -->
   @foreach($commentaires as $commentaire)
    
        <!-- <div class="card-header">
             <h1 class="card-title">  {{ $commentaire->id }}</h1>
              <h1 class="card-title">  {{ $commentaire->fiche_suivie_id }}</h1>
        </div> -->
        <div class="card my-1">
           <div class="card-body row">
            <p class="col-md-9 ">{{ $commentaire->contenu }}.</p>
            <p class="col-md-3">Par {{ $commentaire->user->name}} le {{ $commentaire->created_at->format('d-m-y')}}</p>
           </div>
        </div>
     
     @endforeach
     </div>
</x-app-layout>