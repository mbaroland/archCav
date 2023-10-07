@extends('accueil')
@section('content1')
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
        
            <div class="my-4">
                <h2 class="text-lg font-semibold">NOUVEAU ROLE</h2>
            </div>
            
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf

                        <div class="container mx-auto mt-4">
                            <label for="nom" class="block text-gray-700 font-semibold">ROLE</label>
                            <input type="text" id="nom" name="name" class="form-input w-full rounded-lg" value="{{ old('name') }}" required/>
                            
                        </div>

                        
                        <div class="container mx-auto mt-4">                            <label class="block font-semibold">{{ __('Permission')}} :</label>
                            <br>
                            @foreach($permission as $value)
                                <label>
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                    {{ $value->name }}
                                </label>
                                <br>
                            @endforeach
                        </div>

                        <div class="mb-4 flex justify-between mt-6">
                            <a href="{{ route('roles.index') }}">
                                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                                    Annuler
                                </button>
                            </a>
                            
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                                Enregistrer
                            </button>
                        
                        </div>
                    </form>
                </div>
            </div> <!-- / .card -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
</div>
@endsection
