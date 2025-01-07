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

        @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            <span class="font-medium">
                {{ session('success') }}
            </span>
        </div>
        @endif

        <div class="w-auto mb-5 flex justify-between">
            <div>
                <a href="{{ route('votes.create') }}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i class="fa-solid fa-plus"></i> <span class="px-2">Tambah Data</span></a>
            </div>

            <form method="GET" action="{{ route('votes.index') }}">
                <label for="period" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter by Period</label>
                <select name="period_id" id="period" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="this.form.submit()">
                    <option value="">All Periods</option>
                    @foreach($periods as $period)
                    <option value="{{ $period->id }}" {{ request('period_id') == $period->id ? 'selected' : '' }}>
                        {{ $period->name }}
                    </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="relative overflow-x-auto shadow-md mt-4 sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Siswa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kandidat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Periodei
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Pemilihan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($votes as $vote)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vote->student->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $vote->candidate->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vote->period->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vote->tanggal_pemilihan }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('votes.destroy', $vote->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- <table class="table table-bordered">
            <div class="mb-3">
                <a href="{{ route('votes.create') }}" class="btn btn-success">Tambah Data</a>
            </div>
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Kandidat</th>
                    <th>Periode</th>
                    <th>Tanggal Pemilihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($votes as $vote)
                <tr>
                    <td>{{ $vote->student->name }}</td>
                    <td>{{ $vote->candidate->name }}</td>
                    <td>{{ $vote->period->name }}</td>
                    <td>{{ $vote->tanggal_pemilihan }}</td>
                    <td>
                        <a href="{{ route('votes.edit', $vote->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('votes.destroy', $vote->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> -->
    </div>
    @endsection

</body>

</html>