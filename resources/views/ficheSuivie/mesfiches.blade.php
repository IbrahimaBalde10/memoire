<x-app-layout> 
    @if(session()->has('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
    @endif
    <br><br><br><br> 

    @foreach($ficheSuivies as $ficheSuivie)
    <div class="card">
        <div class="card-header">
             <h1 class="card-title">  {{ $ficheSuivie->titre }}t</h1>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $ficheSuivie->description }}.</p>
            <a href="{{ route('commentaires.create',['ficheSuivie' => $ficheSuivie->id] ) }}"class="btn btn-primary">Aficher</a>
        </div>
     </div><br>
     @endforeach
</x-app-layout>