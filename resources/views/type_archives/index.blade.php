



@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">





        <div class="flex justify-between m-5">
            <input
        id="search-input"
        type="text"
        placeholder="Rechercher..."
        class="w-56 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
    />
    
        
    <a href="{{route('type_archive.create')}}">
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
            Ajouter
         </button>
    </a>
    
        </div>

<div class="overflow-x-auto shadow-md sm:rounded-lg object-center ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                     TYPES_ARCHIVES
                </th>
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>

            </tr>
        </thead>
        <tbody>

            @foreach ($type_archives as $type_archive)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $type_archive->nom_type }}

                    </th>


                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
             @endforeach

            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-white">
                    Aucune archives.
                </td>
            </tr>



        </tbody>
    </table>
</div>
</div>
</div>










@endsection
