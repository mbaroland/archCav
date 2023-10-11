@extends('accueil')
@section('content1')
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">


        <form action="{{ route('realisateur.update',$realisateur ) }}" method="POST">
            @csrf

            <div class="container mx-auto mt-4">
                <label for="nom" class="block text-white font-semibold">Nom Partenaire</label>
                <input type="text" id="nom_type" name="nom_realisateur" class="form-input w-full rounded-lg my-4" value="{{$realisateur->nom_realisateur }}">
            </div>

            <div class="mb-4 flex justify-between">
                <a href="{{ route('partenaires.index') }}">
                    <button type="button"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                        Annuler
                    </button>
                </a>

                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                    Enregistrer
                </button>
            </div>

        </form>

    </div>
@endsection
