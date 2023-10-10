@extends('accueil')
@section('content1')
<div class="rounded-lg bg-white">
    <div class="p-4 border-0 border-gray-200 rounded-lg dark:border-gray-700 mt-16 ">
        
       
            
            

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="container mx-auto mt-4">
                                    <label for="nom" class="block text-gray-700 font-semibold">ROLE : <h3 class="text-green-500">{{$role->name}}</h3></label>
                                    
                                </div>
                            </div>
                            <div class="flex ">
                                <div class="mb-4">
                                    <div class="container mx-auto mt-4">
                                        <label for="nom" class="block text-gray-700 font-semibold">PERMISSIONS :</label>
                                        
                                    </div>
                                    <div class="container mx-auto mt-4 block">
                                    @if(isset($rolePermissions) && count($rolePermissions) > 0)
                                    
                                        @foreach($rolePermissions as $v)
                                            <span class="bg-green-500 text-white font-bold p-1 mt-4 rounded">{{ $v->name }}</span>
                                            
                                        @endforeach
                                    @else
                                    <span class="bg-red-200 p-4">Aucune permission</span>
                                    
                                    @endif
                                </div>
                                </div>
                    
                            </div>
                    </div>

                    <div class="mb-4 flex justify-between mt-6">
                        <a href="{{ route('roles.index') }}">
                            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                                Retour
                            </button>
                        </a>
                        
            
                    </div>
            
    </div>
    </div>
    </div>
@endsection
