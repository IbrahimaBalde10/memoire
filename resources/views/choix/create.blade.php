    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Terminez choix') }}
        </h2>
    </x-slot> 
    
    <form method="POST" action="{{ route('choix.store') }}">
        @csrf
          <!-- Champ caché pour stocker l'ID du sujet sélectionné -->

    <input type="hidden" name="sujet_id" value="{{ $sujet->id }}">

      <div class="mt-4">
        <input type="hidden" name="etudiant_id" value="{{ auth()->user()->etudiant->id }}">
      </div>
      <!-- professeur  -->
    
    <div class="mt-4">
        <label class="block mt-1 w-full">Professeur</label>
        <div class="select">
            <select name="professeur_id">
                <option value="">Sélectionner un professeur</option>
                @foreach($professeurs as $professeur)
                    <option value="{{ $professeur->id }}" {{ old('professeur_id') == $professeur->id ? 'selected' : '' }}>{{ $professeur->user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <p>{{$sujet->id}}</p>
  

        <!-- button -->
        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="ml-4 btn btn-primary">
                {{ __('Terminez choix') }}
            </x-primary-button>
            <!-- <button class="btn btn-primary" type="submite">Effectuer choix</button> -->
        </div>

        
    </form>
</x-app-layout>
