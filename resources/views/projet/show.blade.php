@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
<<<<<<< HEAD

        <div>
            <h3>{{$projet->titre_projet}}</h3>
        </div>

        <div>
            <h3>{{$projet->objectif_global}}</h3>
        </div>

        <div>
            <h3>{{$projet->objectif_specifiques}}</h3>
        </div>

        <div>
            <h3>{{$projet->financement}}</h3>
        </div>
        <div>
            <h3>{{$projet->budjet}}</h3>
        </div>
        <div>
            <h3>{{$projet->zone}}</h3>
        </div>
        <div>
            <h3>{{$projet->date_debut}}</h3>
        </div>
        <div>
            <h3>{{$projet->date_fin}}</h3>
        </div>
        <div>
            <h3>{{$projet->titre_projet}}</h3>
        </div>

    </div>
</div>
=======
       
            
            
>>>>>>> 65ac1979a9b0ac93ad7c32dddb43a98b22bda23e

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
                                    <p>{{ $projet->find_duration()}} mois</p>
                                    
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
                        
            
                    </div>
            
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection
