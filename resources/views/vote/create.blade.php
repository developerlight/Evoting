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
        <h1 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-4">Pemilihan Ketua Osis</h1>
    
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <div class="w-auto rounded-lg shadow-lg border px-3 py-5 bg-white">
        <form action="{{ route('votes.store') }}" method="POST">
            @csrf
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="student">Nama</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="student" name="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="candidate">Kandidat</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="candidate" name="candidate_id" required>
                @foreach($candidates as $candidate)
                    <option value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="period">Periode</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="period" name="period_id" required>
                @foreach($periods as $period)
                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah Vote</button>
        </form>
    </div>
    
    </div>
    @endsection

</body>

</html>

