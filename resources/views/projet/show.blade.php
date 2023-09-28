@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">

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
       
@endsection