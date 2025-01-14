<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png')}}" type="image/x-icon">
    <title>KPU-</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Pemilihan Ketua Osis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @if(Auth::check() && Auth::user()->role == 'admin')
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('periods.index') }}">Periode</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('candidates.index') }}">Kandidat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('votes.index') }}">Pemilihan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('votes.period_form') }}">Suara</a>
                    </li>
                </ul>
                @endif
                @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @endif
                </ul>
        </nav> -->

        <section>
            @if(Auth::check() && Auth::user()->role == 'admin')
            <nav x-data="{ open: false }" class="fixed top-0 z-50 w-full shadow-sm bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-3 py-3 lg:px-5 lg:pl-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start rtl:justify-end">
                            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                                <span class="sr-only">Open sidebar</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                                </svg>
                            </button>
                            <a href="#" class="flex ms-2 md:me-24">
                                <img src="{{ asset('assets/favicon.png')}}" class="h-8 me-3" alt="Logo nav" />
                                <span class="hidden sm:block self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">SMA NEGERI 1 BANYUWANGI</span>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <div class="sm:flex sm:items-center sm:ms-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md color_buttons focus:outline-none transition ease-in-out duration-150">
                                            <div class="text-white">{{ Auth::user()->name }}</div>
                                            <div class="ms-1 text-white">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>


            <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
                @if(Auth::user()->role == 'admin')
                <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-database w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="ms-3">{{ __('Dashboard') }}</span>
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <x-responsive-nav-link :href="route('periods.index')" :active="request()->routeIs('periods.index')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-file-pen w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Tambah periode') }}</span>
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <x-responsive-nav-link :href="route('candidates.index')" :active="request()->routeIs('candidates.index')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-square-plus w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Tambah kandidat') }}</span>
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <x-responsive-nav-link :href="route('votes.index')" :active="request()->routeIs('votes.index')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-user-graduate w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Total pemilih') }}</span>
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <x-responsive-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-person-circle-plus w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap"> {{ __('Tambah siswa') }}</span>
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <x-responsive-nav-link :href="route('votes.period_form')" :active="request()->routeIs('votes.period_form')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-magnifying-glass-chart w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap"> {{ __('Total suara') }}</span>
                            </x-responsive-nav-link>
                        </li>
                    </ul>
                </div>
                @endif
            </aside>
            @endif
        </section>

        <section>
            @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @endif
            </ul>
        </section>


        <div class="p-4 sm:ml-64 bg-gray-100 h-screen  ">
            @yield('content')
        </div>
        <div>
            @yield('votes')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>