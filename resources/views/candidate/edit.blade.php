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
        <h1 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-2">Edit Kandidat</h1>
        <div class="w-auto rounded-lg shadow-lg border px-3 py-5 bg-white">
            <form action="{{ route('candidates.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Name</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="name" name="name" value="{{ $candidate->name }}" required>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="visi">Visi</label>
                        <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="visi" name="visi" required>{{ $candidate->visi }}</textarea>
                    </div>

                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="misi">Misi</label>
                        <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="misi" name="misi" required>{{ $candidate->misi }}</textarea>
                    </div>
                </div>

                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="jargon">Jargon</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="jargon" name="jargon" value="{{ $candidate->jargon }}" required>
                </div>

                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">Photo</label>
                    <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="photo" name="photo">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @if($candidate->photo)
                    <img src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate Photo" width="100">
                    @endif
                </div>

                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="period_id">Period</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="period_id" name="period_id" required>
                        @foreach($periods as $period)
                        <option value="{{ $period->id }}" {{ $candidate->period_id == $period->id ? 'selected' : '' }}>{{ $period->start_date }} - {{ $period->end_date }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Perbarui</button>
                <a href="{{ url()->previous() }}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>
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