



@extends('dashboard')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700">





        <div class="flex justify-between m-5">
            <input
        id="recherche-projet"
        type="text"
        placeholder="Rechercher..."
        class="w-56 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"/>

        
        @can('projet-create')
            <button id="open-modal" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
               Ajouter
            </button>
        @endcan
        </div>

        @if(session('success'))
            <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4 mt-4 my-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4 mt-4 my-4">
                {{ session('error') }}
            </div>
        @endif

        @if(isset($resultat))
        <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4 mt-4 my-4">
        <ul id="resultats-recherche"></ul>
        </div>
        @endif


        

<div class="overflow-x-auto shadow-md sm:rounded-lg object-center ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                     TITRE
                </th>
                <th scope="col" class="px-6 py-3">
                    OBJECTIF GLOBAL
                </th>
                <th scope="col" class="px-6 py-3">
                    FINANCEMENT
                </th>
                <th scope="col" class="px-6 py-3">
                    BUDGET
                </th>
                <th scope="col" class="px-6 py-3">
                    ZONE
                </th>
                <th scope="col" class="px-6 py-3">
                    DUREE
                </th>
                @can('projet-create')
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>
                @endcan
            </tr>
        </thead>
        <tbody>

            @if(isset($projets) && count($projets) > 0)
                @foreach ($projets as $projet)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{ route('projet.show',$projet) }}">{{ $projet->titre_projet }}</a>

                    </th>
                    <td class="px-6 py-4">
                        <a href="{{ route('projet.show',$projet) }}">{{ $projet->objectif_global }}</a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->financement }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->budjet }} FCFA
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->zone }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->find_duration() }} mois
                    </td>
                    @can('projet-create')
                    <td class="px-6 py-4 flex justify-center">
                        <a href="{{ route('projet.edit',$projet) }}">
                            <button type="button" class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit</button>                        
                        </a>

                        <form action="{{ route('projet.destroy', $projet) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                                        
                            <button type="submit" class="mx-4 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Delete</button>

                        </form>

                    </td>
                    @endcan
                </tr>
                @endforeach
            @else
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-white">
                    Aucun projet.
                </td>
            </tr>
            @endif


        </tbody>
    </table>
    
</div>

</div>
@include('projet.create')

<script>

$(document).ready(function () {
    $('#recherche-projet').on('input', function () {
        var termeRecherche = $(this).val();

        $.ajax({
            url: '/recherche-projet',
            method: 'GET',
            data: { q: termeRecherche },
            success: function (data) {
                var resultat = data.resultat;
                var resultatHtml = '';

                $.each(resultat, function (index, projet) {
                    resultatHtml += '<li>';
                    resultatHtml += '<h2>' + projet.titre_projet + '</h2>';
                    resultatHtml += '<p>Catégorie : ' + projet.nom_categorie + '</p>';
                    resultatHtml += '<p>Zone : ' + projet.zone + '</p>';
                    // Ajoutez d'autres détails du projet ici
                    resultatHtml += '</li>';
                });

                $('#resultats-recherche').html(resultatHtml);
            }
        });
    });
});

</script>



@endsection
