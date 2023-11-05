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
                    @foreach ($projet->realisateurs as $financement)
                        {{-- {{ $partenaire->where('id', $financement)->first()->nom_realisateur }} --}}
                        {{ $financement->nom_realisateur }}
                    @endforeach
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
                    <p>{{ $zone->nom_zone }}</p>

                </div>

                <div class="container mx-auto mt-4">
                    <label for="nom" class="block text-gray-700 font-semibold">DUREE :</label>


                </div>
                <div class="container mx-auto mt-4 block">
                    <p>{{ $projet->find_duration() }} mois </p>


                </div>


                <div class="container mx-auto mt-4">
                    <label for="nom" class="block text-gray-700 font-semibold">Responsable du projet :</label>

                </div>

                <div class="container mx-auto mt-4 block">

                    <p>{{ $utilisateur->name }} <br> {{ $utilisateur->prenom }}</p>


                </div>


                <div class="container mx-auto mt-4 block">

                    <!-- <div class="dropdown">
                                                                    <div class="dropdown-content">

                                                        @foreach ($projet->fichiers as $fichier)
    <div class="dropdown">
                                                            <p>{{ substr($fichier->nom_fichier, 8) }}</p>
                                                                    <div class="dropdown-content">

                                                                        <a  href="/storage/{{ $fichier->nom_fichier }}" download="{{ substr($fichier->nom_fichier, 8) }}">
                                                                                        {{ substr($fichier->nom_fichier, 8) }}

                                                                                        </a>

                                                                                    <embed src="/storage/{{ $fichier->nom_fichier }}" type="application/pdf" width="600" height="800">
    @endforeach

                                                                        </div>
                                                                        </div> -->
                    <div class="container mx-auto mt-4">
                        <label for="nom" class="block text-gray-700 font-semibold">archives projet</label>

                    </div>

                    {{-- @foreach ($projet->fichiers as $fichier)
                        <a href="/preview?file=/storage/{{ $fichier->nom_fichier }}" target='blank'>
                            <p>{{ substr($fichier->nom_fichier, 8) }}</p>


                        </a>
                        <hr>
                    @endforeach --}}


                    @foreach ($projet->fichiers as $fichier)
                        <a href="/storage/{{ $fichier->nom_fichier }}" target='_blank'>
                            <p>{{ substr($fichier->nom_fichier, 8) }}</p>
                        </a>
                        {{-- <a href="{{ $fichier->nom_fichier }}" class="download-button">
                            /storage/{{ $fichier->nom_fichier }}
                        </a> --}}
                        <hr>
                    @endforeach

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

    </div>



    </div>



    @include('archives.style')


    </div>

    @include('archives.style')




    <script>
        // Récupérer tous les liens de fichiers
        const fileLinks = document.querySelectorAll('.file-link');

        // Parcourir chaque lien de fichier
        fileLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const url = link.getAttribute('href');

                // Vérifier si le fichier est un PDF
                if (url.endsWith('.pdf')) {
                    // Ouvrir le fichier PDF dans un nouvel onglet
                    window.open(url, '_blank');
                } else {
                    // Rediriger vers la page de téléchargement pour les autres types de fichiers
                    const downloadLink = link.nextElementSibling;
                    window.location.href = downloadLink.getAttribute('href');
                }
            });
        });
    </script>


    <style>
        .download-button {
            background-color: #4CAF50;
            /* Couleur de fond du bouton */
            color: white;
            /* Couleur du texte du bouton */
            border: none;
            /* Supprime les bordures du bouton */
            padding: 8px 16px;
            /* Espacement intérieur du bouton */
            text-align: center;
            /* Centrer le texte */
            text-decoration: none;
            /* Supprimer les soulignements du texte */
            display: inline-block;
            border-radius: 4px;
            /* Coins arrondis */
            cursor: pointer;
            /* Curseur de la souris en main */
        }

        .download-button:hover {
            background-color: #45a049;
            /* Couleur de fond au survol */
        }
    </style>
@endsection
