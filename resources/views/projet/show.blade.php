@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       
            
            

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="container mx-auto mt-4">
                                    <label for="nom" class="block text-gray-700 font-semibold">PROJET : <h3 class="text-green-500">{{ $projet->titre_projet }}</h3></label>
                                    
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

                                <label for="nom" class="block text-gray-700 font-semibold">OBJECTIFS SPECIFIQUES :</label>
                                        
                                        </div>
                                        <div class="container mx-auto mt-4 block">
                                            <p>{{ $projet->objectif_global }}</p>
                                        
                                    </div>
                                </div>

                                <ul class="mt-4">
                <li><strong>Financement:</strong> {{ $projet->financement }}</li>
                <li><strong>Budget:</strong> {{ $projet->budjet }} FCFA</li>
                <li><strong>Zone:</strong> {{ $projet->zone }}</li>
                <li><strong>Durée:</strong> {{ $projet->find_duration() }} mois</li>
                <!-- Ajoutez d'autres détails du projet ici -->
            </ul>
                    
                            </div>
                    </div>

                    <div class="mb-4 flex justify-between mt-6">
                        <a href="{{ route('projet.index') }}">
                            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                                Retour
                            </button>
                        </a>
                        
            
                    </div>
            
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection

