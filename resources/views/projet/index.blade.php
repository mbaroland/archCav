@extends('accueil')
@section('content1')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">










        <div class="flex justify-between m-5">
            {{-- <input id="recherche-projet" type="text" placeholder="Rechercher..." --}}
            {{-- class="w-56 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" /> --}}

            <div></div>
            @can('projet-create')
                <button id="open-modal" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                    Ajouter
                </button>
            @endcan
        </div>

        @if (session('success'))
            <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4 mt-4 my-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4 mt-4 my-4">
                {{ session('error') }}
            </div>
        @endif

        @if (isset($resultat))
            <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4 mt-4 my-4">
                <ul id="resultats-recherche"></ul>
            </div>
        @endif




        <div class="overflow-x-auto shadow-md sm:rounded-lg object-center ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="table">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            TITRE
                        </th>
                        <!-- <th scope="col" class="px-6 py-3">
                            OBJECTIF GLOBAL
                        </th> -->
                        <th scope="col" class="px-6 py-3">
                            PARTENAIRES
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
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CHARRGE DU PROJET
                        </th>
                        @can('projet-create')
                            <th scope="col" class="px-6 py-3">
                                ACTION
                            </th>
                        @endcan
                    </tr>
                </thead>
                <tbody>

                    @if (isset($projets) && count($projets) > 0)
                        @foreach ($projets as $projet)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <a href="{{ route('projet.show', $projet) }}">{{ $projet->titre_projet }}</a>

                                </th>
                                <!-- <td class="px-6 py-4">
                                    <a href="{{ route('projet.show', $projet) }}">{{ $projet->objectif_global }}</a>
                                </td> -->
                                <td class="px-6 py-4">
                                    @foreach ($projet->realisateurs as $financement)
                                        {{-- {{ $partenaire->where('id', $financement)->first()->nom_realisateur }} --}}
                                        {{ $financement->nom_realisateur }}
                                    @endforeach

                                    {{-- {{ $projet->getRealisateursList() }} --}}



                                </td>
                                <td class="px-6 py-4">
                                    {{ $projet->budjet }} FCFA
                                </td>

                                <td class="px-6 py-4">

                                    {{ $projet->id_zone }}

                                    @foreach ($zones as $zone)
                                        @if ($projet->id_zone === $zone->id)
                                            {{ $zone->nom_zone }}
                                        @endif
                                    @endforeach

                                </td>
                                <td class="px-6 py-4">
                                    {{ $projet->find_duration() }}
                                </td>
                                <td class="px-6 py-4">{{ $projet->user->name }} <br> {{ $projet->user->prenom }}</td>

                                @can('projet-create')
                                    <td class="px-6 py-4 flex justify-center">
                                        <a href="{{ route('projet.edit', $projet) }}">
                                            <button type="button"
                                                class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit</button>
                                        </a>
                                        @can('projet-delete')
                                            <form action="{{ route('projet.destroy', $projet) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="mx-4 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Delete</button>

                                            </form>
                                        @endcan

                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500 dark:text-white">
                                Aucun projet.
                            </td>
                        </tr>
                    @endif


                </tbody>
            </table>

        </div>

    </div>
    @include('projet.create')





    <style>
        .custom-search input[type="search"] {
            /* background-color: gray; */
            border: 1px solid #ccc;
            border-radius: 4px;
            red padding: 5px;
            margin: 25px;
            width: 200px;
        }

        .dataTables_empty {
            text-align: center;
        }
    </style>



    <script>
        new DataTable('#table', {
            // Options de configuration de DataTables
            lengthChange: false, // Désactiver la sélection du nombre de lignes
            info: false,
            dom: '<"custom-search"f>t',
            paging: false,
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
                "search": "",
                "searchPlaceholder": "rechercher"
            }
        });
    </script>







    <script>
        const openModalButton = document.getElementById('open-modal');
        const closeModalButton = document.getElementById('close-modal');
        const modal = document.getElementById('modal');

        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>



    <script>
        let errors = '{!! $errors !!}';
        console.log(errors);
        console.log(errors.length);

        if ((errors.length) > 2) {
            console.log(errors.length);
            modal.classList.remove('hidden');
        }
    </script>


@endsection
