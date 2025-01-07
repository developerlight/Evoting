@extends('layouts.navbar')

@section('content')
<div class="container mt-20">
    <h1 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-4">Edit Periode</h1>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="w-auto rounded-lg shadow-lg border px-3 py-5 bg-white">
                <form action="{{ route('periods.update', $period->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Name Priode</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="name" name="name" value="{{ $period->name }}">
                    </div>
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="start_date">Tanggal Mulai</label>
                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="start_date" name="start_date" value="{{ $period->start_date }}">
                    </div>
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="end_date">Tanggal Berakhir</label>
                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="end_date" name="end_date" value="{{ $period->end_date }}">
                    </div>
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="status">Status</label>
                        <select class="form-control block p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="status" name="status">
                            <option value="aktif" {{ $period->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="ditutup" {{ $period->status == 'ditutup' ? 'selected' : '' }}>Ditutup</option>
                        </select>
                    </div>


                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Perbarui</button>
                    <a href="{{ route('periods.index') }}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection