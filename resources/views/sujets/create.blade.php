<x-app-layout>
<br><br><br> 
<!-- <div class="formSujet container-fluid align-items-center aling-self-cenetr mx-5 pe-6" > -->
<div class="ooo ">    
<form method="POST" action="{{ route('sujets.store') }}" 
  class="formula " fill="#212529">
    <!-- <form method="POST" action="{{ route('sujets.store') }}" style="width: 700px;" 
  class="position-absolute top-0 start-30   ms-5 me-1" fill="#212529"> -->
        @csrf
        <div class="row  container-fluid ms-4 ">
        <nav class="aa1 navbar px-3 my-2 text-align-center text-uppercase text-light">Ajout d'un sujet</nav>
<br>
        <div class="col-md-6 bg- ms-3 ps-6 border border-raduis  bg-light">

        <br>
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
</div>

 <div class="col-md-5 border border-raduis  bg-light">
            

       
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
        <div class="mt-4 ">
            <label class="block mt-1 w-ful">Professeur</label>
            <div class="select form-">
                <select name="professeur_id">
                    <option class="form- block mt-1 w-ful" value="">Sélectionner un professeur</option>
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
</div>

        </div>
        <!-- button -->
        <div class="flex items-center justify-center mt-6 row ">
            <x-primary-button class=" col-md-2 ml-4 btn btn-info">
                {{ __('Proposer') }}
            </x-primary-button>
             <!-- <p class="btn btn-info mx-2 col-md-2">Proposer</p>
            <p class="btn btn-danger col-md-2">Annuler</p> -->
            
        </div>
    </form>
</div>
</x-app-layout>
