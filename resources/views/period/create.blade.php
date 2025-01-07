<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png')}}" type="image/x-icon">
    <title>KPU-</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>


<body class="antialiased">

    @extends('layouts.navbar')

    @section('content')
    <div class="container mt-20">
        <h2 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-4">Buat Priode Baru</h2>
        <div class="w-auto rounded-lg shadow-lg border px-3 py-5 bg-white">
            <form action="{{ route('periods.store') }}" method="POST" onsubmit="return validateDates()">
                @csrf
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Name Priode</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="name" name="name" required>
                </div>
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="start_date">Tanggal Mulai</label>
                    <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="start_date" name="start_date" required>
                </div>
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="end_date">Tanggal Berakhir</label>
                    <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="end_date" name="end_date" required>
                </div>
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" id="date-error" style="display: none;">
                    <span class="font-medium">
                        Tanggal Berakhir tidak boleh lebih awal dari tanggal mulai.
                    </span>
                </div>
                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" id="date-success" style="display: none;">
                    <span class="font-medium">
                        Tanggal berlaku.
                    </span>
                </div>
                <button type="submit" class="text-white  bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        function validateDates() {
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;
            var errorDiv = document.getElementById('date-error');

            if (new Date(endDate) < new Date(startDate)) {
                errorDiv.style.display = 'block';
                return false;
            } else {
                errorDiv.style.display = 'none';
                return true;
            }
        }
    </script>
    @endsection

</body>

</html>