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
        <div class="mb-8">
            <a href="{{ route('periods.create') }}" class="text-white  bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"> <i class="fa-solid fa-plus"></i> <span class="px-2">Tambah</span> </a>
        </div>




        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Mulai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Berakhir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periods as $period)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $period->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $period->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $period->start_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $period->end_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $period->status }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('periods.edit', $period->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('periods.destroy', $period->id) }}" method="POST" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <!-- <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($periods as $period)
                <tr>
                    <td>{{ $period->id }}</td>
                    <td>{{ $period->name }}</td>
                    <td>{{ $period->start_date }}</td>
                    <td>{{ $period->end_date }}</td>
                    <td>{{ $period->status }}</td>
                    <td>
                        <a href="{{ route('periods.edit', $period->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('periods.destroy', $period->id) }}" method="POST" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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