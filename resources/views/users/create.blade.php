@extends('accueil')
@section('content1')
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3">
            <div class="my-4">
                <h2 class="text-lg font-semibold">{{ __('Create New User') }}</h2>
            </div>
            <div class="flex items-center my-4">
                <div class="flex-grow">
                    <a href="{{ route('users.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Back') }}
                    </a>
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
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
            
                        <div>
                            <x-label for="prenom" value="{{ __('Prenom') }}" />
                            <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
                        </div>
            
                        <div>
                            <x-label for="profil" value="{{ __('Profil') }}" />
                            <x-input id="profil" class="block mt-1 w-full" type="text" name="profil" :value="old('profil')" required autofocus autocomplete="profil" />
                        </div>
            
                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>
            
                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
            
                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                        <div class="col-span-12">
                            <div class="mb-4">
                                <strong class="font-semibold">{{ __('Role') }}:</strong>
                                <select name="roles[]" multiple class="w-full border rounded p-2">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 lg:flex justify-between">
                            <a class="btn grey btn-outline-secondary" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div> <!-- / .card -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->     
</div>   
@endsection