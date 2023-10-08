@extends('dashboard')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">




                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="container mx-auto mt-4">
                                        
                                        
                                        
                                    <label for="nom" class="block text-gray-700 font-semibold">PROJET : </label>
                                    <h1 class='text-2xl font-bold'>{{ $projet->titre_projet }}</h1>
                                    
                                </div>
                            </div>
                            <div class="flex ">
                                <div class="mb-4">
                                    <div class="container mx-auto mt-4">
                                        <label for="nom" class="block text-gray-700 font-semibold">OBJECTIF GLOBAL :</label>
                                        
                                    </div>
                                <div class="container mx-auto mt-4 block">
                                        <p>{{ $projet->objectif_global }}</p>
                                    
                                </div>



                    <div class="container mx-auto mt-4">
                        <label for="nom" class="block text-gray-700 font-semibold">OBJECTIFS SPECIFIQUES :</label>

                    </div>
                    <div class="container mx-auto mt-4 block">
                        <p>{{ $projet->objectif_specifiques }}</p>

                    </div>


                    <div class="container mx-auto mt-4">
                        <label for="nom" class="block text-gray-700 font-semibold">FINANCEMENT :</label>

                    </div>
                    <div class="container mx-auto mt-4 block">
                        <p>{{ $projet->financement }}</p>

                    </div>



                    <div class="container mx-auto mt-4">
                        <label for="nom" class="block text-gray-700 font-semibold">BUDGET :</label>

                    </div>
                    <div class="container mx-auto mt-4 block">
                        <p>{{ $projet->budjet }} FCFA</p>

                    </div>

                    <div class="container mx-auto mt-4">
                        <label for="nom" class="block text-gray-700 font-semibold">ZONE :</label>

                    </div>
                    <div class="container mx-auto mt-4 block">
                        <p>{{ $projet->zone }}</p>

                    </div>

                    <div class="container mx-auto mt-4">
                        <label for="nom" class="block text-gray-700 font-semibold">DUREE :</label>

                    </div>
                    <div class="container mx-auto mt-4 block">
                        <p>{{ $projet->find_duration() }} mois</p>

                    </div>

                </div>







            </div>
        </div>

        <div class="mb-4 flex justify-between mt-6">
            <a href="{{ route('projet.index') }}">
                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                    Retour
                </button>
            </a>


                            <div class="dropdown">
                                <button
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Télécharger</button>
                                <div class="dropdown-content">
                                    @foreach ($projet->fichiers as $fichier)
                                        <a download href="/storage/{{ $fichier->nom_fichier }}">
                                            {{ substr($fichier->nom_fichier, 9) }}
                                        </a>
                                    @endforeach
    
                                </div>
    
                        </div>
                        
                        </div>
</div> <!-- .container-fluid -->
@include('archives.style')

@endsection
