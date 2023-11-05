@extends('dashboard')
@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">





            <div class="flex justify-between m-5">
               <div>

               </div>
               @can('projet-create')


                <button id="ajoutCat" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
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

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg object-center ">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                AXE STRATEGIQUE/DOMAINES D'INTERVENTION
                            </th>
                            @can('projet-create')
                                <th scope="col" class="px-6 py-3 text-center">
                                    ACTION
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>

                        @if (isset($projet_categories) && count($projet_categories) > 0)
                            @foreach ($projet_categories as $categorie)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        {{ $categorie->nom_categorie }}

                                    </th>
                                    @can('projet-create')
                                        <td class="px-6 py-4 flex justify-center">
                                            <a href="{{ route('categorie_projet.edit', $categorie) }}">
                                                <button type="button"
                                                    class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                                            </a>
                                            @can('projet-delete')
                                                <form action="{{ route('categorie_projet.destroy', $categorie) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="mx-4 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>

                                                </form>
                                            @endcan
                                        </td>
                                    @endcan
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

    @endsection
