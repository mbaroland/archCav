


<!-- Le modal  creation de projet -->

<div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-3/4 md:max-w-md lg:w-3/4 xl:w-3/4 mx-auto rounded shadow-lg z-50 overflow-y-auto p-2">


        <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">ENREGISTREMENT D'UN PROJET</p>
                <button id="close-modal" class="modal-close px-3 py-1 rounded-full hover:bg-gray-300">&times;</button>
            </div>

            <!-- formulaire-->
            <form action="{{ route('projet.store') }}" class="space-y-4" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="max-h-96 overflow-y-auto px-6">

                        <div class="container mx-auto mt-4">
                            <label for="select-box" class="block text-gray-700 font-semibold">AXE STRATEGIQUE</label>
                            <select  name="id_categorie" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500 bg-white text-gray-700">
                                @if(isset($categorie_projets) && !empty($categorie_projets))
                                    @foreach ($categorie_projets as $categorie)
                                        <option value="{{ $categorie->id }}" class="py-2">{{ $categorie->nom_categorie }}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled selected>Aucune catégorie disponible</option>
                                @endif
                            </select>

                        </div>
                        <div class="container mx-auto mt-4">
                            <label for="nom" class="block text-gray-700 font-semibold">Nom du Projet</label>
                            <input type="text" id="nom" name="titre_projet" class="form-input w-full rounded-lg">
                        </div>
                    <div class="container mx-auto mt-4">
                        <label for="description" class="block text-gray-700 font-semibold">Objectif Global</label>
                        <textarea  name="objectif_global" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"></textarea>
                    </div>

                    <div class="container mx-auto mt-4">
                        <label for="description" class="block text-gray-700 font-semibold">Objectifs Specifiques</label>
                        <textarea  name="objectif_specifiques" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 font-semibold">Financement</label>
                        <input type="text"  name="financement" class="form-input w-full rounded-lg">
                    </div>


                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 font-semibold">Budget</label>
                        <input type="text"  name="budjet" class="form-input w-full rounded-lg">
                    </div>


                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 font-semibold">Zone</label>
                        <input type="text"  name="zone" class="form-input w-full rounded-lg">
                    </div>

                    <div class="container mx-auto mt-4">
                        <label for="date" class="block text-gray-600 font-medium">Date de début du Projet :</label>
                        <input type="date"  name="date_debut" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">

                    </div>

                    <div class="container mx-auto mt-4">
                        <label for="date" class="block text-gray-600 font-medium">Date de fin du Projet :</label>
                        <input type="date"  name="date_fin" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">

                    </div>

                    <div class="container mx-auto mt-4">
                    <label class="block text-gray-600 font-medium">
                        Fichiers associés au Projet
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" class="block w-full text-sm text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-violet-50 file:text-violet-700
                          hover:file:bg-violet-100
                        " name="fichier_projet[]" multiple/>
                      </label>
                    </div>
                </div>



                <div class="mb-4 flex justify-between">
                    <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                        Annuler
                    </button>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('projet-modal');
        const closeButton = document.getElementById('close-modal');

        closeButton.addEventListener('click', function () {
            modal.classList.add('hidden');
            alert('hmmm');
        });
    });
</script>




objectif global doit etre superieur a 5 caracteres et le budjet doit etre seulemnet des chiffres
