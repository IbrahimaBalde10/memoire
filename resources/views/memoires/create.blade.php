    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Soummettre mémoires') }}
        </h2>
    </x-slot>
<div class="card bg-primary position-relative" >
    <form method="POST" action="{{ route('memoires.store') }}" style="width: 700px;" 
        class="position-absolute top-50 start-30   ms-5 me-1" fill="#212529"
        enctype="multipart/form-data" >
        @csrf
        <!-- Mot cle -->
        <div class="mt-4">
            <x-input-label for="fichiepdf" :value="__('Memoire')" />

            <x-text-input placeholder="Choisir votre fiche" id="fichiepdf" class="block mt-1 w-full"
                            type="file"
                            name="fichiepdf"
                            accept=" .pdf"
                             />
            <x-input-error :messages="$errors->get('fichiepdf')" class="mt-2" />
        </div>
       <!--  -->

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

       <!--  -->
     
        <!-- button -->
        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="ml-4">
                {{ __('Soumettre') }}
            </x-primary-button>
        </div>
    </form>
  
</div>
  
   
</x-app-layout>
