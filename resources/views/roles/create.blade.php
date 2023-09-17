@extends('dashboard')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
        <div class="w-full md:w-2/3">
            <div class="my-4">
                <h2 class="text-lg font-semibold">{{ __('Create New Role') }}</h2>
            </div>
            <div class="flex items-center my-4">
                <div class="flex-grow">
                    <a href="{{ route('roles.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Back') }}
                    </a>
                </div>
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
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block font-semibold">{{ __('Name') }}:</label>
                            <input type="text" name="name" placeholder="Name" class="form-input" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-semibold">{{ __('Permission')}} :</label>
                            <br>
                            @foreach($permission as $value)
                                <label>
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                    {{ $value->name }}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Save') }}
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
