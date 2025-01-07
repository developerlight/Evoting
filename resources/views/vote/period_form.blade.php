@extends('layouts.navbar')

@section('content')
<div class="container">
    <h1 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-4">Total Suara</h1>

    <form action="{{ route('votes.index_by_period') }}" method="GET">
        <div class="form-group">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="period_id">Pilih Periode</label>
            <select name="period_id" id="period_id" class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($periods as $period)
                    <option value="{{ $period->id }}">{{ $period->name }} ({{ $period->start_date }} - {{ $period->end_date }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Lihat Suara</button>
    </form>
</div>
@endsection