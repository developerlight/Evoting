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
    .custom-background {
        background-image: url('/assets/background.png');
        background-size: cover;
        background-position: center;
    }
</style>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white dark:bg-gray-900 custom-background">
        <div>
            <a href="/">
                <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                <img src="{{ asset('assets/favicon.png')}}" class="w-28 h-2w-28" alt="">
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>