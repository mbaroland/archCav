@extends('dashboard')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       <div class="col-md-12">                  
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="block text-gray-700 font-bold">MISE À JOUR DU ROLE</h2>
                </div>
                
            </div>                  
            
            @if (count($errors) > 0)
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
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container mx-auto mt-4">
                            <label for="nom" class="block text-gray-700 font-semibold">ROLE :</label>
                            <input type="text" id="nom" name="name" class="form-input w-full rounded-lg" value="{{ $role->name }}" required/>
                            
                        </div>

                        <div class="container mx-auto mt-4">
                            <label class="block text-gray-700 font-semibold my-2">PERMISSIONS :</label>
                          
                            @foreach($permission as $value)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" 
                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}
                                        class="form-checkbox text-indigo-600 h-5 w-5">
                                    <span class="ml-2">{{ $value->name }}</span>
                                </label>
                                <br/>
                            @endforeach
                        </div>
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
            
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection

