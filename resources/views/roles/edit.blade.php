@extends('dashboard')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       <div class="col-md-12">                  
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Edit Role') }}</h2>
                </div>
                <div class="col-auto">
                    <a href="{{ route('roles.index') }}" class="btn btn-primary" style="color:rgb(59, 71, 199)">
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
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" value="{{ $role->name }}" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">{{ __('Permission') }}</label>
                            <br/>
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

                        <div class="text-center">
                            <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div> <!-- / .card -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection
