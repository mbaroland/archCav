@extends('accueil')
@section('content1')
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
        <div>



                            </div>


            <div class="dropdown">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
                    id="telecharger-button">Télécharger</button>
                <div class="dropdown-content" id="fichiers-dropdown" style="display: none;">
                    @foreach ($projet->fichiers as $fichier)
                        <div class="file-item">
                            <a href="/storage/{{ $fichier->nom_fichier }}"
                                download="{{ substr($fichier->nom_fichier, 8) }}">
                                {{ substr($fichier->nom_fichier, 8) }}
                            </a>
                            <button class="visualiser-button"
                                data-src="/storage/{{ $fichier->nom_fichier }}">Visualiser</button>
                            <embed src="" class="pdf-embed" type="application/pdf" width="600" height="800"
                                style="display: none;">
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Modal -->
            <div class="fixed inset-0 flex items-center justify-center z-50 overflow-x-hidden overflow-y-auto hidden"
                id="pdfModal">
                <div class="modal-box">
                    <div class="modal-header">
                        <h3 class="text-lg font-semibold">Prévisualisation du PDF</h3>
                        <button class="modal-close" id="closeModal">×</button>
                    </div>
                    <div class="modal-body">
                        <!-- Zone pour le contenu du embed -->
                        <div id="embed-container">
                            <embed src="" class="pdf-embed" type="application/pdf">
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>





    </div> <!-- .container-fluid -->
    @include('archives.style')





    <!-- Modal -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const visualiserButtons = document.querySelectorAll('.visualiser-button');
            const pdfModal = document.getElementById('pdfModal');
            const embedContainer = document.getElementById('embed-container');
            const closeModal = document.getElementById('closeModal');
            const pdfEmbed = document.querySelector('.pdf-embed');

            visualiserButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    const src = button.getAttribute('data-src');
                    pdfEmbed.src = src;

                    // Charger le PDF pour obtenir ses dimensions
                    pdfEmbed.onload = function() {
                        const pdfWidth = pdfEmbed.clientWidth;
                        const pdfHeight = pdfEmbed.clientHeight;

                        // Définir la taille du modal en fonction des dimensions du PDF
                        pdfModal.style.width = pdfWidth +30+ 'px';
                        pdfModal.style.height = pdfHeight + 'px';

                        // Afficher le modal
                        pdfModal.classList.remove('hidden');
                    };
                });
            });

            closeModal.addEventListener('click', function() {
                pdfModal.classList.add('hidden');
            });
        });
    </script>






    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const visualiserButtons = document.querySelectorAll('.visualiser-button');
            const pdfModal = document.getElementById('pdfModal');
            const pdfEmbed = document.querySelector('.pdf-embed');
            const closeModal = document.getElementById('closeModal');

            visualiserButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    const src = button.getAttribute('data-src');
                    pdfEmbed.src = src;
                    pdfModal.classList.remove('hidden');
                });
            });

            closeModal.addEventListener('click', function() {
                pdfModal.classList.add('hidden');
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const telechargerButton = document.getElementById('telecharger-button');
            const fichiersDropdown = document.getElementById('fichiers-dropdown');
            const visualiserButtons = document.querySelectorAll('.visualiser-button');
            const pdfEmbed = document.querySelector('.pdf-embed');

            telechargerButton.addEventListener('click', function() {
                if (fichiersDropdown.style.display === 'none') {
                    fichiersDropdown.style.display = 'block';
                } else {
                    fichiersDropdown.style.display = 'none';
                }
            });

            visualiserButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    const src = button.getAttribute('data-src');
                    pdfEmbed.src = src;
                    pdfEmbed.style.display = 'block';
                });
            });
        });
    </script>

                        </div>

    {{-- ----------------------------- --}}


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
