@extends('accueil')
@section('content1')
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
        <form action="{{ route('zones.update', $zone->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="container mx-auto mt-4">
                <label for="date" class="block text-gray-600 font-medium"> catégorie document</label> <input type="text"
                    id="nom" name="nom_zone" class="form-input w-full rounded-lg" value="{{ $zone->nom_zone }}">
            </div>
    </div>



    <div class="mb-4 flex justify-between">
        <a href="{{ route('zones.index') }}">
            <button type="button" class=" bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                Annuler
            </button>
        </a>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
            Mettre a jour
        </button>
        </form>
    </div>
@endsection
