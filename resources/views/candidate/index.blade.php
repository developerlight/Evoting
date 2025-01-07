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

        <div class="mb-8">
            <a href="{{ route('candidates.create') }}" class="text-white  bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i class="fa-solid fa-plus"></i> <span class="px-2">Tambah Kandidat</span></a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Visi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Misi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jargon
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tahun Periode
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidates as $candidate)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $candidate->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $candidate->visi }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $candidate->misi }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $candidate->jargon }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $candidate->photo) }}" alt="Photo of {{ $candidate->name }}" style="width: 100px; height: auto;">
                        </td>
                        <td class="px-6 py-4">
                            {{ $candidate->period->start_date }} - {{ $candidate->period->end_date }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('candidates.edit', $candidate->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kandidat ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Jargon</th>
                    <th>Gambar</th>
                    <th>Tahun Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->visi }}</td>
                    <td>{{ $candidate->misi }}</td>
                    <td>{{ $candidate->jargon }}</td>
                    <td><img src="{{ asset('storage/' . $candidate->photo) }}" alt="Photo of {{ $candidate->name }}" style="width: 100px; height: auto;"></td>
                    <td>{{ $candidate->period->start_date }} - {{ $candidate->period->end_date }}</td>
                    <td>
                        <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kandidat ini?')">Hapus</button>
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