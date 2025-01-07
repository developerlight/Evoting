<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png')}}" type="image/x-icon">
    <title>KPU-SMA Negeri 1 Banyuwangi</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="antialiased">

    @extends('layouts.navbar')

    @section('content')
    <div class="container mt-20">
        <h1 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-2">Tambah Kandidat</h1>
        <div class="w-auto rounded-lg shadow-lg border px-3 py-3 bg-white">
            <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Nama Kandidat:</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="name" name="name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="visi">Visi:</label>
                        <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="visi" name="visi" rows="3" required></textarea>
                        @error('visi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="misi">Misi:</label>
                        <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="misi" name="misi" rows="3" required></textarea>
                        @error('misi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="period_id">Periode:</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="period_id" name="period_id" required>
                        <option value="">Pilih Periode</option>
                        @foreach($periods as $period)
                        <option value="{{ $period->id }}">{{ $period->start_date }} - {{ $period->end_date }}</option>
                        @endforeach
                    </select>
                    @error('periode_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="jargon">Jargon:</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="jargon" name="jargon" required>
                    @error('jargon')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">Gambar:</label>
                    <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="photo" name="photo" required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="text-white  bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Simpan</button>
            </form>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    @endsection

</body>

</html>