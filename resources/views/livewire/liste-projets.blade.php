<div class="mt-5">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
        <div class="flex justify-between">
            <h4>
                Liste des Projets
            </h4>
            <button class="bg-green-500 rounded-md p-4 text-white" onclick="Livewire.emit('openModal','form-projets')">Ajouter</button>
        </div>

    </div>



    {{-- angel --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Titre_projet
                </th>
                <th scope="col" class="px-6 py-3">
                    Objectif_global
                </th>
                <th scope="col" class="px-6 py-3">
                    Financement
                </th>
                <th scope="col" class="px-6 py-3">
                    Budget
                </th>
                <th scope="col" class="px-6 py-3">
                    Zone
                </th>
                <th scope="col" class="px-6 py-3">
                    Durée
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            
            
        </tbody>
    </table>
</div>

</div>
