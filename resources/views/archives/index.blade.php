@extends('dashboard')
@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">



            <div class="flex justify-between m-5">
                <input id="search-input" type="text" placeholder="Rechercher..."
                    class="w-56 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" />
                  @can('archive-create')  
                <a href="{{ route('archive.create') }}">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Ajouter
                    </button>
                </a>
                @endcan

            </div>


            <div class="overflow-x-auto shadow-md sm:rounded-lg object-center">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="p-2">
                                TITRE_ARCHIVES
                            </th>
                            <th class="p-2">
                                ARCHIVES
                            </th>
                            @can('archive-create')
                            <th class="p-2">
                                ACTIONS
                            </th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($archives) && count($archives) > 0)
                            @foreach ($archives as $archive)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $archive->titre_archives }}
                                    </td>
                                    <td>

                                            {{-- < button type="submit"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                                                Telecharger
                                            /button>
 --}}

                                            <div class="dropdown">
                                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Télécharger</button>
                                                <div class="dropdown-content">
                                                @foreach ($archive->fichiers as $fichier )

                                                    <a download href="/storage/{{$fichier->nom_fichier}}"> {{$fichier->nom_fichier}}</a>
                                                @endforeach



                                                </div>
                                              </div>
                                              @include('archives.style')







                                    </td>
                                    @can('archive-create')
                                    <td class="px-6 py-4 flex justify-center">
                                        <a href="#">
                                            <button type="button"
                                                class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit</button>
                                        </a>
                                        
                                        <form action="{{ route('archive.destroy', $archive) }}" method="POST">
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
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-white">
                                    Aucune archive.



                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
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