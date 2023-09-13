
@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       

@if(isset($categorie_projet))

<form action="{{ route('categorie_projet.update', $categorie_projet) }}" method="POST" class="space-y-4"
enctype="multipart/form-data">
        
    @else
    <form action="{{ route('categorie_projet.store') }}" method="POST" class="space-y-4"
    enctype="multipart/form-data">
    @endif

    @csrf


    <div class="max-h-96 overflow-y-auto px-6">

        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-semibold">Axe Stratégique</label>
            <input
                type="text"
                value="{{$categorie_projet->nom_categorie}}"
                name="nom_categorie"
                class="form-input w-full rounded-lg"
                id="nom" 
            >
        </div>
        
    </div>

    <div class="mb-4 flex justify-between">
        <a href="{{ route('categorie_projet.index') }}">
            <button type="button" class="modal-close bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                Annuler
            </button>
        </a>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
            Enregistrer
        </button>
    </div>
</form>
</div>
</div>
@endsection