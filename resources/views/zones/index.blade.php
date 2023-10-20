@extends('accueil')
@section('content1')

    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">





        <div class="flex justify-between m-5">

            <div></div>
            @can('projet-create')
                <a href="{{ route('zone.create') }}">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Ajouter
                    </button>
                </a>
            @endcan


        </div>

        <div class="overflow-x-auto shadow-md sm:rounded-lg object-center ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                        Zones
                        </th>
                        @can('projet-create')
                            <th scope="col" class="px-6 py-3 text-center">
                                ACTION
                            </th>
                        @endcan

                    </tr>
                </thead>
                <tbody>
                    <!-- @if (isset($realisateurs))
                        @foreach ($realisateurs as $realisateur)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    {{ $realisateur->nom_realisateur }}

                                </th> -->


                                @can('projet-create')
                                    <td class="px-6 py-4 flex justify-center text-center">
                                        <a href="{{ route('zone.edit', $zone) }}">
                                            <button type="button"
                                                class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit</button>
                                        </a>

                                        <form action="{{ route('zone.destroy', $zone) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="mx-4 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Delete</button>
                                        </form>

                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-white">
                                Aucune zone
                        </tr>
                    @endif


                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
