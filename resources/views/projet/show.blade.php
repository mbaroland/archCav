@extends('accueil')
@section('content1')
        <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16 rounded-lg bg-white">




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

                    <div class="container mx-auto mt-4 block">
                    @foreach ($projet->fichiers as $fichier)

                                    <button id='open-modal'>{{ substr($fichier->nom_fichier, 8) }}</button>
                                                    

                                
                    @endforeach

                    </div>
                    

        <script>
            
        const openModalButton = document.getElementById('open-modal');
        const closeModalButton = document.getElementById('close-modal');
        const modal = document.getElementById('modal');

        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

            </script>


                </div>







            </div>
        


                    <div class="mb-4 flex justify-between mt-6">
                        <a href="{{ route('projet.index') }}">
                            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                                Retour
                            </button>
                        </a>
                        <div>

                            <div class="dropdown">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Télécharger</button>
                                <div class="dropdown-content">
                                    @foreach ($projet->fichiers as $fichier)
                                    <a  href="/storage/{{ $fichier->nom_fichier }}" download="{{ substr($fichier->nom_fichier, 8) }}">
                                                    {{ substr($fichier->nom_fichier, 8) }}

                                                    </a>

                                                <embed src="/storage/{{ $fichier->nom_fichier }}" type="application/pdf" width="600" height="800">
                                    @endforeach

                                </div>

                            </div>

                        </div>

                        </div>

                        </div>



</div>

@include('archives.style')


<div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div
        class="modal-container bg-white w-3/4 md:max-w-md lg:w-3/4 xl:w-3/4 mx-auto rounded shadow-lg z-50 overflow-y-auto p-2">


        <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">ENREGISTREMENT D'UN PROJET</p>
                <button id="close-modal" class="modal-close px-3 py-1 rounded-full hover:bg-gray-300">&times;</button>
            </div>


        </div>
    </div>
</div>



@endsection
