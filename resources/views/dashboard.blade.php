<x-app-layout>





    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar"
        aria-controls="cta-button-sidebar" type="button"
        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 mt-16">
        {{-- <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
       <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg> --}}
    </button>

    <aside id="cta-button-sidebar"
        class="fixed top-16 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-red-400  ">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ url('/dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>



                <!-- Menu "Projets" -->

                @can('projet-list')
                    <div x-data="{ openProjets: false }">
                        <button @click="openProjets = !openProjets"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group w-full">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M3 1h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3z" />
                                <path d="M2 4h14v2H2z" />
                                <path d="M2 8h14v2H2z" />
                                <path d="M2 12h9v2H2z" />
                            </svg>

                            <span class="ml-3 whitespace-nowrap">Projets</span>

                            {{-- @if (isset($projets) && count($projets) > 0)
             <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ count($projets) }}</span>
             @else
             <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300"></span>

             @endif --}}


                        </button>


                        <div x-show="openProjets" @click.away="openProjets = false" class="pl-4">

                            <!-- Contenu du sous-menu "Projets" -->
                            @can('projet-list')
                                <a href="{{ route('projet.index') }}"
                                    class="block p-2 text-gray-900 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">Projets</a>
                            @endcan
                            @can('type_projet-list')
                                <a href="{{ route('categorie_projet.index') }}"
                                    class="block p-2 text-gray-900 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">Axe
                                    stratégique</a>
                            @endcan
                            @can('projet-list')
                                <a href="{{ route('partenaires.index') }}"
                                    class="block p-2 text-gray-900 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">
                                    Partenaires</a>
                            @endcan
                            @can('projet-list')
                                <a href="{{ route('zone.index') }}"
                                    class="block p-2 text-gray-900 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">
                                    Zones</a>
                            @endcan
                        </div>

                    </div>
                @endcan


                <!-- Menu "Archives" -->
                @can('archive-create')

                    <div x-data="{ openArchives: false }">
                        <button @click="openArchives = !openArchives"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group w-full">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M3 2h12a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm0-1a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H3z" />
                                <path d="M7 4h4v2H7zM5 7h8v2H5zM5 10h8v2H5z" />
                            </svg>

                            <span class="ml-4 whitespace-nowrap">Documents Administratifs</span> {{-- @if (isset($projets) && count($projets) > 0)
             <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ count($projets) }}</span>
             @else
             <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300"></span>

             @endif --}}
                        </button>
                        <div x-show="openArchives" @click.away="openArchives = false" class="pl-4">
                            <!-- Contenu du sous-menu "Archives" -->
                            @can('archive-create')
                                <a href="{{ route('archive.index') }}"
                                    class="block p-2 text-gray-900 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">Documents</a>
                            @endcan
                            @can('type_archive-list')
                                <a href="{{ route('type_archive.index') }}"
                                    class="block p-2 text-gray-900 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">Types
                                    Documents</a>
                            @endcan
                        </div>
                    </div>
                @endcan

                <!-- Menu "Users" -->
                @can('user-create')
                    <div x-data="{ openRoles: false }">
                        <button @click="openRoles = !openRoles"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group w-full">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class=" ml-4 whitespace-nowrap">Users/Roles</span>

                            {{-- @if (isset($projets) && count($projets) > 0)
             <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ count($projets) }}</span>
             @else
             <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300"></span>

             @endif --}}
                        </button>
                        <div x-show="openRoles" class="pl-4">
                            <!-- Contenu du sous-menu "Users" -->
                            @can('user-list')
                                <a href="{{ route('users.index') }}"
                                    class="block p-2 text-gray-900 hover:text-gray-700 dark:text-white dark:hover:text-gray-300"
                                    @click="openRoles = false">Users</a>
                            @endcan
                            @can('role-create')
                                <a href="{{ route('roles.index') }}"
                                    class="block p-2 text-gray-900 hover:text-gray-700 dark:text-white dark:hover:text-gray-300"
                                    @click="openRoles = false">Roles</a>
                            @endcan
                        </div>
                    </div>

                @endcan







                {{-- <li>
            <a href="{{route('type_archive.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                  <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Type archives</span>
            </a>
         </li>

          <li>
             <a href="{{ route('roles.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                   <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>
             </a>
          </li> --}}
                <li>

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap">Deconnexion</span>
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>

                </li>

            </ul>
        </div>

    </aside>


    {{-- ---------------------------------restes des fichiers ici ------------------------------------- --}}


    <main>
        @yield('content')
    </main>
    {{-- <div class=" sm:ml-64">

    <div class="p-4 border-2  rounded-lg dark:border-gray-700 border-blue-900">


    </div>
 </div> --}}

    </div>
    </div>




</x-app-layout>
