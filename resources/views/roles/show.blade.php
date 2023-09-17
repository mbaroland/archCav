@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       
            <div class="my-4">
                <h2 class="text-lg font-semibold">{{ __('Show Role') }}</h2>
            </div>
            <div class="flex items-center my-4">
                <div class="flex-grow">
                    <a href="{{ route('roles.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
            
            

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="mb-4">
                                    <strong class="text-gray-700">{{ __('Name') }}:</strong>
                                    {{ $role->name }}
                                </div>
                            </div>
                            <div class="block ">
                                <div class="mb-4">
                                    <strong class="text-gray-700">{{ __('Permissions') }}:</strong>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <span class="bg-green-500 text-white font-bold py-1 px-2 m-2  rounded mr-2">{{ $v->name }}</span>
                                            
                                        @endforeach
                                    
                                    @endif
                                </div>
                    
                            </div>
                    </div>
            
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection
