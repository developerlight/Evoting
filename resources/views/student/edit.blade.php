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

<body class="antialiased">
    
    @extends('layouts.navbar')
    
    @section('content')
    <div class="container mt-20">
        <h2 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-2">Edit Student Data</h2>
        <div class="w-auto rounded-lg shadow-lg border px-3 py-5 bg-white">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
    
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Name:</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="name" name="name" value="{{ $student->name }}" required>
                </div>
    
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="kelas">Kelas:</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="kelas" name="kelas" value="{{ $student->kelas }}" required>
                </div>
    
                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nis">NIS:</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nis" name="nis" value="{{ $student->nis }}" required>
                </div>

                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="email">Email:</label>
                    <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="email" name="email" value="{{ $student->email }}" required>
                </div>

                <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="status">Status:</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="status" name="status" required>
                        <option value="sudah" {{ $student->status == 'sudah' ? 'selected' : '' }}>Sudah</option>
                        <option value="belum" {{ $student->status == 'belum' ? 'selected' : '' }}>Belum</option>
                    </select>
                </div>
    
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Perbarui</button>
                <a href="{{ route('students.index') }}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>
            </form>
        </div>
    </div>
    @endsection


</body>

</html>




