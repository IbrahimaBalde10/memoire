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


<div class="row p-6">
     @foreach($memoires as $memoire)

    <div class="card col-md-5 mx-1 ">
        <!-- title -->
        <div class="car-title row">
            <p class="col-md-9 my-4">{{$memoire->created_at->format('d-m-y')}}
                <!-- {{$memoire->created_at->format('dd/mm/yyyy')}} -->
            </p>
            <p class="col-md-3 my-4"><a class="btn btn-primary"
                                 href="{{asset('storage/' .$memoire->fichiepdf)}}" 
                                download>Télecharger
                </a></p>
        </div>
        <!-- body -->
        <div class="card-body">
            <p class="card-text"><strong>{{ $memoire->sujet->libelle }}</strong></p>
            <p class="card-text">{{ $memoire->sujet->resume }}</p>
        </div>
        <!-- footer -->
         <div class="car-title row">
            <p class="col-md-9 my-3">
                <a class="btn btn-info text-white" 
                               href="{{ route('memoires.show', $memoire->id) }}"
                               target=" _blank"
                               >Consulter</a>
             </p>
            <p class="col-md-3 my-3"><u><strong>{{ $memoire->etudiant->user->name }}</strong></u></p>
        </div>
    </div>
     @endforeach
</div>
<!--  -->
<div class="">
     @foreach($memoires as $memoire)

    <div class="card mx-3 ">
        <!-- title -->
        <div class="car-title row">
            <p class="col-md-9 m-3">{{$memoire->created_at->format('d-m-y')}}
                <!-- {{$memoire->created_at->format('dd/mm/yyyy')}} -->
            </p>
            <p class="col-md-2 m-3 "><a class="btn btn-primary"
                                 href="{{asset('storage/' .$memoire->fichiepdf)}}" 
                                download>Télecharger
                </a></p>
        </div>
        <!-- body -->
        <div class="card-body">
            <p class="card-text"><strong>{{ $memoire->sujet->libelle }}</strong></p>
            <p class="card-text">{{ $memoire->sujet->resume }}</p>
        </div>
        <!-- footer -->
         <div class="car-title row">
            <p class="col-md-9 m-3">
                <a class="btn btn-info text-white" 
                               href="{{ route('memoires.show', $memoire->id) }}"
                               target=" _blank"
                               >Consulter</a>
             </p>
            <p class="col-md-2 m-3"><u><strong>{{ $memoire->etudiant->user->name }}</strong></u></p>
        </div>
    </div>
     @endforeach
</div>
      
</x-app-layout>