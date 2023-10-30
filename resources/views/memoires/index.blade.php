<x-app-layout> 
      <br><br><br>
        <div class="container-fluid">
            @if(session()->has('info'))
            <div class="alert alert-success" role="alert">
                {{session('info')}}
            </div>
            @endif
        
    <header class=" card-header row">
        <div class="select col-md-8  ">
            <nav style="background-color: rgb(58, 58, 136);"
            class="aa22 navbar px-4  text-align-center text-uppercase text-light">Liste des mémoires</nav>

        </div>
        <div class="col-md-4">
          
            <div class="container-fluid">
                <form action="" class="d-flex">
                    <input placeholder="Entrez votre mot clé" aria-label="search" class="form-control me-2 border border-1">
                    <button style="background-color: rgb(58, 58, 136);" class="btn btn-success">Rechercher</button>
                 
                </form>
            </div>
        </div>
    </header>
</div>


<div class="row p-3 m-3">
     @foreach($memoires as $memoire)

    <div class="bg-white card p-3 col-md-4 border border-3 border-light ">
        <!-- title -->
        <div class="car-title row">
            <p class="col-md-8 my-2">Publié le {{$memoire->created_at->format('d-m-y')}}
                <!-- {{$memoire->created_at->format('dd/mm/yyyy')}} -->
            </p>
            <p class="col-md-3 my-2"><a class="btn btn-primary"
                                 href="{{asset('storage/' .$memoire->fichiepdf)}}" 
                                download>Télecharger
                </a></p>
        </div>
        <!-- body -->
        <?php
      
            // $sujet = App\Sujet::find(1); // Remplacez 1 par l'ID de votre sujet
            // $summary = $sujet->resume;
            $summary = $memoire->sujet->resume ;
            $words = str_word_count($summary, 1);
            $first10Words = implode(' ', array_slice($words, 0, 10));
          ?>
        <div class="card-body">
            
            <p class="card-text"><strong>{{ $memoire->sujet->libelle }}</strong></p>
            <!-- <p class="card-text">{{ $memoire->sujet->resume }}</p> -->
             <!-- <p class="card-text">{{ $first10Words}}........<a class="btn btn-info text-white" 
                               href="{{ route('memoires.show', $memoire->id) }}"
                               target=" _blank"
                               >Lire plus</a></p> -->
             <p class="card-text">{{ $first10Words}}........<a class="fs-4 text-info fw-medium" 
                               href="{{ route('memoires.show', $memoire->id) }}"
                               target=" _blank"
                               >Lire plus</a></p>
            
        </div>
        <!-- footer -->
         <div class="car-title row">
            <!-- <p class="col-md-9 my-3">
                <a class="btn btn-info text-white" 
                               href="{{ route('memoires.show', $memoire->id) }}"
                               target=" _blank"
                               >Consulter</a>
             </p> -->
            <!-- <p class="col-md-3 my-3"><u><strong>{{ $memoire->etudiant->user->name }}</strong></u></p> -->
            <p class="col-md- my-1"><u><strong>{{ $memoire->etudiant->user->name }}</strong></u></p>

        </div>
    </div>
     @endforeach
</div>

</x-app-layout>