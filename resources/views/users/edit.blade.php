@extends('dashboard')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       <div class="col-md-12">                  
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="block text-gray-700 font-bold">MISE À JOUR DU COMPTE</h2>
                </div>
                
            </div>  

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $user->name) }}" />
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="text" name="email" id="email" placeholder="Email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('email', $user->email) }}" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                </div>

                <div class="mb-4">
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                </div>

                <div class="mb-4">
                    <label for="roles" class="block text-sm font-medium text-gray-700">{{ __('Role') }}</label>
                    <select name="roles[]" id="roles" class="form-select rounded-md shadow-sm mt-1 block w-full" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ in_array($role->id, $userRole) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 flex justify-between">
                    <a href="{{ route('users.index') }}">
                        <button type="button"
                            class=" bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                            Annuler
                        </button>
                    </a>

                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Enregistrer
                    </button>
                </div>
            </form>
        
        </div>
    
</div>
</div>

@endsection