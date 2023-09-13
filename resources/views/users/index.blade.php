{{-- 
@extends('dashboard')

@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
    <div class="my-4">
        <div class="flex items-center">
            <h2 class="text-3xl font-semibold">{{ __('Users') }}</h2>
            @can('user-create')
                <a href="{{ route('users.create') }}" class="ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    {{ __('New') }}
                </a>
            @endcan
        </div>
    </div>

    <nav class="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Users') }}</li>
        </ol>
    </nav>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="my-4">
        <div class="card shadow">
            <div class="card-body">
                <!-- table -->
                <table class="table datatables w-full" id="dataTable-1">
                    <thead>
                        <tr>
                            <th class="w-1/12">#</th>
                            <th class="w-3/12">{{ __('Name') }}</th>
                            <th class="w-3/12">{{ __('Email') }}</th>
                            <th class="w-2/12">{{ __('Roles') }}</th>
                            <th class="w-3/12">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    @foreach ($data as $key => $user)
                    <tbody>
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        {{ $v }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="{{ route('users.show', $user->id) }}">{{ __('Show') }}</a>
                                @can('user-edit')
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">{{ __('Edit') }}</a>
                                @endcan
                                @can('user-delete')
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {!! $data->render() !!}
                <!-- end table -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection --}}

@extends('dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
       




        <div class="flex justify-between m-5">
            <input
        id="search-input"
        type="text"
        placeholder="Rechercher..."
        class="w-56 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"/>
            <button id="open-modal" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
               Ajouter
            </button>
        </div>

        @if(session('success'))
            <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4 mt-4 my-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4 mt-4 my-4">
                {{ session('error') }}
            </div>
        @endif

<div class="relative overflow-x-auto shadow-md sm:rounded-lg object-center ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                     ID
                </th>
                <th scope="col" class="px-6 py-3">
                    NOM
                </th>
                <th scope="col" class="px-6 py-3">
                    EMAIL
                </th>
                <th scope="col" class="px-6 py-3">
                    ROLE
                </th>
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>

            @if(isset($data) && count($data) > 0)
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                {{ $v }}
                            @endforeach
                        @endif
                    </td>
                    <td class="px-6 py-4 flex justify-center">
                        <a href="{{ route('users.edit',$user) }}">
                            <button type="button" class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit</button>                        
                        </a>

                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                                        
                            <button type="submit" class="mx-4 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Delete</button>

                        </form>

                    </td>
                </tr>
                @endforeach
            @else
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-white">
                    Aucun projet.
                </td>
            </tr>
            @endif
            
            
        </tbody>
    </table>
</div>
</div>

@endsection
