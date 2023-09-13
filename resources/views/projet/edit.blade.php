
@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64 ">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       

@if(isset($projet))
<form action="{{ route('projet.update',$projet) }}"method="POST" class="space-y-4"
enctype="multipart/form-data">

@else
<form action="{{ route('projet.store') }}"method="POST" class="space-y-4"
enctype="multipart/form-data">
@endif
@csrf


                
    <div class="container mx-auto mt-4">
        <label for="select-box" class="block text-gray-700 font-semibold">AXE STRATEGIQUE</label>
        <select  name="id_categorie" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500 bg-white text-gray-700">
            <option value="{{ $projet->id_categorie }}" class="py-2">{{$categorie_old->nom_categorie}}</option>
            @if(isset($categorie_projets) && !empty($categorie_projets))
                @foreach ($categorie_projets as $categorie)
                    <option value="{{ $categorie->id }}" class="py-2">{{ $categorie->nom_categorie }}</option>
                @endforeach
            @else
                <option value="" disabled >Aucune catégorie disponible</option>
            @endif
        </select>
        
    </div>
    <div class="container mx-auto mt-4">
        <label for="nom" class="block text-gray-700 font-semibold">Nom du Projet</label>
        <input type="text" id="nom" name="titre_projet" class="form-input w-full rounded-lg"
        value="{{ $projet->titre_projet }}">
    </div>
<div class="container mx-auto mt-4">
    <label for="description" class="block text-gray-700 font-semibold">Objectif Global</label>
    <textarea  name="objectif_global" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        {{ $projet->objectif_global }}
    </textarea>
</div>

<div class="container mx-auto mt-4">
    <label for="description" class="block text-gray-700 font-semibold">Objectifs Specifiques</label>
    <textarea  name="objectif_specifiques" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        {{ $projet->objectif_specifiques }}
    </textarea>
</div>

<div class="mb-4">
    <label for="nom" class="block text-gray-700 font-semibold">Financement</label>
    <input type="text"  name="financement" class="form-input w-full rounded-lg"
    value="{{ $projet->financement }}">
</div>


<div class="mb-4">
    <label for="nom" class="block text-gray-700 font-semibold">Budget</label>
    <input type="text"  name="budjet" class="form-input w-full rounded-lg"
    value="{{ $projet->budjet }}">
</div>


<div class="mb-4">
    <label for="nom" class="block text-gray-700 font-semibold">Zone</label>
    <input type="text"  name="zone" class="form-input w-full rounded-lg"
    value="{{ $projet->zone }}">
</div>

<div class="container mx-auto mt-4">
    <label for="date" class="block text-gray-600 font-medium">Date de début du Projet :</label>
    <input type="date"  name="date_debut" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
    value="{{ $projet->date_debut }}">

</div> 

<div class="container mx-auto mt-4">
    <label for="date" class="block text-gray-600 font-medium">Date de fin du Projet :</label>
    <input type="date"  name="date_fin" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
    value="{{ $projet->date_debut }}">

</div> 

<div class="container mx-auto mt-4">
<label class="block text-gray-600 font-medium">
    Fichiers associés au Projet
    <span class="sr-only">fichiers</span>
    <input type="file" class="block w-full text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100
    " name="fichier_projet[]" multiple
    value="{{ $fichier }}"/>
  </label>
</div>

<div class="mb-4 flex justify-between">
    <a href="{{ route('projet.index') }}">
        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
            Annuler
        </button>
    </a>
    
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
        Enregistrer
    </button>
</form>
</div>




</div>
@endsection