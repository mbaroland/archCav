@extends('accueil')
@section('content1')
        <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">

            <form action="{{ route('archive.store') }}" class="space-y-4" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container mx-auto mt-4">
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">choisir le type
                        de
                        l'archives</label>
                    <select id="countries" name="id_type_archive"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($type_archive as $type)
                            <option value="{{ $type->id }}">{{ $type->nom_type }}</option>
                        @endforeach
                    </select>

                </div>



                <div class="container mx-auto mt-4">
                    <label for="nom" class="block text-gray-700 font-semibold">Titre Archive</label>
                    <input type="text" id="nom" name="titre_archives" class="form-input w-full rounded-lg" >
                </div>

                @if(session('error'))
            <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4 mt-4 my-4">
                {{ session('error') }}
            </div>
        @endif


        @if ($errors->any())
        <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4 mt-4 my-4 flex items-center">
            <span class="text-xl mr-2">⚠️</span>
            <ul class="list-disc pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


                <div class="container mx-auto mt-4">
                    <label>fichier archive</label>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        file</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file" name="fichier_archives[]" multiple>
                </div>

                <div class="mb-4 flex justify-between">
                    <a href="{{ route('archive.index') }}">
                        <button type="button"
                            class=" bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                            Annuler
                        </button>
                    </a>

                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Enregistrer
                    </button>
            </form>
        </div>


    </div>
    </div>
@endsection
