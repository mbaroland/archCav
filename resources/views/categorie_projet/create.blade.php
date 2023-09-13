


<!-- Le modal  creation de projet -->

<div id="modalAjoutCat" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-3/4 md:max-w-md lg:w-3/4 xl:w-3/4 mx-auto rounded shadow-lg z-50 overflow-y-auto p-2">
        

        <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">ENREGISTREMENT D'UN AXE STRATEGIQUE</p>
                <button id="close-modal" class="modal-close px-3 py-1 rounded-full hover:bg-gray-300">&times;</button>
            </div>
            
            <!-- formulaire-->
            <form action="{{ route('categorie_projet.store') }}" class="space-y-4" method="POST" enctype="multipart/form-data">
               
                @csrf
               
                <div class="max-h-96 overflow-y-auto px-6">
                

                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 font-semibold">Axe Stratégique</label>
                        <input type="text"  name="nom_categorie" class="form-input w-full rounded-lg">
                    </div>


                    
                </div>

                <div class="mb-4 flex justify-between">
                    <div>
                        
                    </div>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const openModalButtonCat = document.getElementById('ajoutCat');

        const closeModalButtonCat = document.getElementById('close-modal');
        const modalCat = document.getElementById('modalAjoutCat');

        openModalButtonCat.addEventListener('click', () => {
            
            modalCat.classList.remove('hidden');
        });

        closeModalButtonCat.addEventListener('click', () => {
            modalCat.classList.add('hidden');
        });

        modalCat.addEventListener('click', (e) => {
            if (e.target === modalCat) {
                modalCat.classList.add('hidden');
            }
        });
</script>