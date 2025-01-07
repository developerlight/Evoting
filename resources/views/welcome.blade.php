<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png')}}" type="image/x-icon">
    <title>KPU-</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<style>
    nav {
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    .background {
        background-image: url('/assets/banner.png');
        background-size: cover;
        background-position: center;
    }
</style>

<body class="antialiased">



    <nav class="bg-white shadow-2xl border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/favicon.png')}}" class="h-10" alt="Logo Navbar" />
                <span class="hidden sm:block self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Junior High School</span>
                <span class="block sm:hidden self-center text-2xl font-semibold whitespace-nowrap dark:text-white">JUHIS</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</a>
                @endif
            </div>
        </div>
    </nav>


   
    <div class="background">
        <img src="{{ asset('assets/banner.png')}}" class="h-auto sm:h-screen w-full" alt="">
    </div>

</body>

</html>