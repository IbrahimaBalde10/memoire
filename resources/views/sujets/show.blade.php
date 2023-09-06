<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Information du sujet')
        </h2>

       
    </x-slot>
    <div class="card">
    <div class="card-body">
         <p class="font-semibold text-xl text-gray-800">@lang('Libelle')
            :{{ $sujet->libelle }}</p>
            <p class="font-semibold text-xl text-gray-800 pt-2">@lang('resume'):{{ $sujet->resume }}</</p>
            <p>@lang('Provenance'): {{ $sujet->user->name }}</p>
             
            <p class="font-semibold text-xl text-gray-800 pt-2">@lang('Professeur')
    : {{ $sujet->user->name }}</p>
    </div>
    </div>
    
</x-app-layout>