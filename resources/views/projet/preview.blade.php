<!-- Le modal  creation de projet -->

<div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div
        class="modal-container bg-white w-3/4 md:max-w-md lg:w-3/4 xl:w-3/4 mx-auto rounded shadow-lg z-50 overflow-y-auto p-2">


        <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">ENREGISTREMENT D'UN PROJET</p>
                <button id="close-modal" class="modal-close px-3 py-1 rounded-full hover:bg-gray-300">&times;</button>
            </div>

            <!-- formulaire-->
            <div >
                <embed src="/storage/{{ $fichier->nom_fichier }}" type="application/pdf" width="600" height="800">

            </div>

        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('projet-modal');
        const closeButton = document.getElementById('close-modal');

        closeButton.addEventListener('click', function() {
            modal.classList.add('hidden');
            alert('hmmm');
        });
    });
</script>
