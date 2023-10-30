    <x-app-layout>
     <br><br><br>
<div class="container-fluid bg-seconda ooo" 
>
    <div class="container  ">
    <nav     style="width: 75em;"
    class="aa1 navbar px-4 text-uppercase text-light">Fiche de suivie</nav>

    <form method="POST" action="{{ route('ficheSuivie.store') }}" 
    style="width: 600px; margin-left: 16em; padding: 1em;" 
    class=" bg-light border border-1 border-light my-3" fill="#212529">
        @csrf

        <!-- Titre -->
        <div>
            <x-input-label  for="titre" :value="__('Titre')" />
            <x-text-input placeholder="Veuillez entree le titre du fiche" id="titre" class="block mt-1 w-full" type="text" name="titre" :value="old('titre')" required autofocus autocomplete="titre" />
            <x-input-error :messages="$errors->get('titre')" class="mt-2" />
        </div>
<br>
        <!-- description -->
        <div>
    <x-input-label for="description" :value="__('Description')" />
    <textarea placeholder="Veuillez taper la  description "  id="description" class="block mt-1 w-full" name="description" required autofocus autocomplete="description">{{ old('description') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>
    <br>
        <!-- Mot cle -->
        <div class="mt-4">
            <x-input-label for="fiche" :value="__('Importer un document')" />

            <x-text-input placeholder="Veuillez i;porter lq fiche" id="fiche" class="block mt-1 w-full"
                            type="file"
                            name="fiche"
                           
                             />

            <x-input-error :messages="$errors->get('fiche')" class="mt-2" />
        </div>
      <!-- id de l'etudiant -->
         <div class="mt-4">
        <input type="hidden" name="etudiant_id" value="{{ $choix->etudiant_id}}">
        </div>

          <!-- id de l'encadreeur -->
         <div class="mt-4">
        <input type="hidden" name="professeur_id" value="{{ $choix->professeur_id}}">
        </div>
       <!-- id sujet -->
        <div class="mt-4">
        <input type="hidden" name="sujet_id" value="{{ $choix->sujet_id }}">
        </div>
        <!-- button -->
        <!-- <div class="flex items-center justify-center mt-6">
            <x-primary-button class="ml-4">
                {{ __('Créer') }}
            </x-primary-button>
        </div> -->
          <div class="flex items-center  row justify-center mt-6">
                <button class="btn btn-primary mx-2 col md-1">Créer</button>  
                <button class="btn btn-danger col md-1">Annuler</button>
          </div>
    </form>
  
</div>
</div>  
   
</x-app-layout>
