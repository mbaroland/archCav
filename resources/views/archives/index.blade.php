



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
    @can('archive-create')
    <a href="{{route('archive.create')}}">
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
                <th scope="col" class="px-6 py-3">
                     TITRE_ARCHIVES
                </th>
                <th scope="col" class="px-6 py-3">
                    ARCHIVES
                </th>
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>

            </tr>
        </thead>
        <tbody>

            @if(isset($archives) && count($archives) > 0)
                @foreach ($archives as $archive)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $archive->titre_archives }}

                    </th>
                  
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            @else
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-white">
                    Aucune archive.
                </td>
            </tr>
            @endif


        </tbody>
    </table>
</div>
</div>



{{-- <script>


const openModalButtonArchive = document.getElementById('open-modal-archive');
        const closeModalButtonarchive = document.getElementById('close-modal-archive');
        const modalarchive = document.getElementById('modalarchive');

        openModalButtonArchive.addEventListener('click', () => {
            modalarchive.classList.remove('hidden');
        });

        closeModalButtonarchive.addEventListener('click', () => {
            modalarchive.classList.add('hidden');
        });

        modalarchive.addEventListener('click', (e) => {
            if (e.target === modalarchive) {
                modalarchive.classList.add('hidden');
            }
        });

</script> --}}

@endsection
