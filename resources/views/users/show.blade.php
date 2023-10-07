@extends('accueil')
@section('content1')
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3">
            <div class="my-4">
                <h2 class="text-lg font-semibold">{{ __('Show User') }}</h2>
            </div>
            <div class="flex items-center my-4">
                <div class="flex-grow">
                    <a href="{{ route('users.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
            <div class="my-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="col-span-12">
                            <div class="mb-4">
                                <strong class="font-semibold">{{ __('Name') }}:</strong>
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="col-span-12">
                            <div class="mb-4">
                                <strong class="font-semibold">{{ __('Email') }}:</strong>
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="col-span-12">
                            <div class="mb-4">
                                <strong class="font-semibold">{{ __('Roles') }}:</strong>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <span class="badge badge-success bg-green-500 text-white px-2 py-1 rounded-full">{{ $v }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
