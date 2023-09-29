@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
        <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $projet->titre_projet }}</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $projet->objectif_global }}</p>

            <!-- Ajoutez d'autres détails du projet ici -->
            <ul class="mt-4">
                <li><strong>Financement:</strong> {{ $projet->financement }}</li>
                <li><strong>Budget:</strong> {{ $projet->budjet }} FCFA</li>
                <li><strong>Zone:</strong> {{ $projet->zone }}</li>
                <li><strong>Durée:</strong> {{ $projet->find_duration() }} mois</li>
                <!-- Ajoutez d'autres détails du projet ici -->
            </ul>

            <!-- Ajoutez d'autres sections ou détails du projet selon vos besoins -->
        </div>
    </div>
</div>

@endsection
