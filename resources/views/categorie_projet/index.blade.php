@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700">
       




        <div class="flex justify-between m-5">
            <input
        id="search-input"
        type="text"
        placeholder="Rechercher..."
        class="w-56 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
    />
            <button id="ajoutCat" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
               Ajouter
            </button>
        </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg object-center ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                     AXE STRATEGIQUE
                </th>
               
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>

            @if(isset($projet_categories) && count($projet_categories) > 0)
                @foreach ($projet_categories as $categorie)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $categorie->nom_categorie }}

                    </th>
                    
                    <td class="px-6 py-4">
                        <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline modCat " data-id="{{ $categorie }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            @else
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-white">
                    Aucun axe strategique.
                </td>
            </tr>
            @endif
            
            
        </tbody>
    </table>
</div>
</div>
@include('categorie_projet.create')

@include('categorie_projet.edit')

@endsection 