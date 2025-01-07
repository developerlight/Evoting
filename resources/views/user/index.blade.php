<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png')}}" type="image/x-icon">
    <title>KPU-</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>

    <section>
        <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/favicon.png')}}" class="h-8 me-3" alt="Logo nav" />
                    <span class="hidden sm:block self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">SMA NEGERI 1 BANYUWANGI</span>
                </a>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <div class="flex items-center">
                        <div class="sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md color_buttons focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ms-1">
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
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block py-2 px-3 text-white bg-transparent rounded md:bg-transparent md:text-gray-700 md:p-0 md:dark:text-gray-500">
                                {{ __('Home') }}
                            </x-nav-link>
                        </li>
                        <li>
                            <x-nav-link :href="route('students.index_user')" :active="request()->routeIs('students.index_user')" class="block py-2 px-3 text-white bg-transparent rounded md:bg-transparent md:text-gray-700 md:p-0 md:dark:text-gray-500">
                                {{ __('Vote') }}
                            </x-nav-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </section>


    <div class="flex justify-center items-center mt-20">
        <div class="container max-w-screen-xl">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="px-3">
                <h1 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-2">Periode {{ $period->name }}</h1>
                <p class="text-sm font-normal text-gray-900 mb-2">Tahun Periode: {{ $period->start_date }} / {{ $period->end_date }}</p>
                @if($student->status == 'sudah')
            </div>
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' . $chosenCandidate->photo) }}" alt="{{ $chosenCandidate->name }}">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $chosenCandidate->name }}</h5>
                    <h5 class="mb-2 text-lg font-normal tracking-tight text-gray-900 dark:text-white"><span class="font-semibold italic text-xl">Jargon :</span> {{ $chosenCandidate->jargon }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-semibold italic text-xl">Misi :</span> {{ $chosenCandidate->misi }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-semibold italic text-xl">Visi :</span> {{ $chosenCandidate->visi }}</p>
                </div>
            </div>
            @else
            <!-- vote -->
            <div class="p-4 border-gray-200 mt-14">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                    @foreach($candidates as $candidate)
                    <form action="{{ route('students.vote_user', $candidate->id) }}" method="POST"
                        class="w-full bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->name }}" />
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $candidate->name }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-semibold italic text-xl">Jargon :</span> {{ $candidate->jargon }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-semibold italic text-xl">Visi :</span> {{ $candidate->visi }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-semibold italic text-xl">Misi :</span> {{ $candidate->misi }}</p>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Vote</button>
                        </div>
                    </form>
                    @endforeach
                    @endif
                </div>
            </div>





<!-- 
            <h1>Periode {{ $period->name }}</h1>
            <p>Tahun Periode: {{ $period->start_date }} / {{ $period->end_date }}</p>
            @if($student->status == 'sudah')
            <div class="paslon">
                <h2>{{ $chosenCandidate->name }}</h2>
                <img src="{{ asset('storage/' . $chosenCandidate->photo) }}" alt="{{ $chosenCandidate->name }}" width="300">
                <p>Visi: {{ $chosenCandidate->visi }}</p>
                <p>Misi: {{ $chosenCandidate->misi }}</p>
                <p>Jargon: {{ $chosenCandidate->jargon }}</p>
            </div>
            @else
            @foreach($candidates as $candidate)
            <form action="{{ route('students.vote_user', $candidate->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                <div class="paslon">
                    <h2>{{ $candidate->name }}</h2>
                    <img src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->name }}" width="300">
                    <p>Visi: {{ $candidate->visi }}</p>
                    <p>Misi: {{ $candidate->misi }}</p>
                    <p>Jargon: {{ $candidate->jargon }}</p>
                    <button type="submit" class="btn btn-primary">Vote</button>
                </div>
            </form>
            @endforeach
            @endif -->
        </div>
    </div>
</body>

</html>