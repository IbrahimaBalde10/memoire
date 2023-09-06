    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proposer un sujet') }}
        </h2>
    </x-slot>
<div class="card bg-primary position-relative" >
    <form method="POST" action="{{ route('sujets.store') }}" style="width: 700px;" 
  class="position-absolute top-50 start-30   ms-5 me-1" fill="#212529">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label  for="libelle" :value="__('Libelle')" />
            <x-text-input placeholder="Veuillez taper le libelle du sujet" id="libelle" class="block mt-1 w-full" type="text" name="libelle" :value="old('libelle')" required autofocus autocomplete="libelle" />
            <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
        </div>

        <!-- Resume -->
        <div>
    <x-input-label for="resume" :value="__('Resume')" />
    <textarea placeholder="Veuillez taper le résumé du sujet"  id="resume" class="block mt-1 w-full" name="resume" required autofocus autocomplete="resume">{{ old('resume') }}</textarea>
    <x-input-error :messages="$errors->get('resume')" class="mt-2" />
</div>
    
        <!-- Mot cle -->
        <div class="mt-4">
            <x-input-label for="motCle" :value="__('Mots clés')" />

            <x-text-input placeholder="Veuillez taper quelques mots clés du sujet" id="motCle" class="block mt-1 w-full"
                            type="text"
                            name="motCle"
                            required autocomplete="motCle"
                             />

            <x-input-error :messages="$errors->get('motCle')" class="mt-2" />
        </div>

       
        <div class="mt-4">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        </div>
        
        <!--filiere  -->
      

        <div>
    <ul class="list-group">
        <label class="form-check-label">Filieres</label>
        @foreach($filieres as $filiere)
        <li class="list-group-item">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $filiere->id }}" name="cats[]" id="filiereCheckbox{{ $filiere->id }}" {{ in_array($filiere->id, old('cats') ?: []) ? 'checked' : '' }}>
                <label class="form-check-label" for="filiereCheckbox{{ $filiere->id }}">{{ $filiere->name }}</label>
            </div>
        </li>
        @endforeach
    </ul>
</div>

  


        <!-- professeur  -->
        @if(auth()->user()->role === 'etudiant')
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
    @endif


    @if(auth()->user()->role === 'professeur')
    <div class="mt-4">
        <input type="hidden" name="professeur_id" value="{{ auth()->user()->professeur->id }}">
    </div>
    @endif

        <!-- button -->
        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="ml-4">
                {{ __('Proposer') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-app-layout>
