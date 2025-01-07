@extends('layouts.navbar')

@section('content')
<div class="container">
    <h1 class="text-2xl italic font-semibold text-gray-900 dark:text-white mb-1"> Suara Pemilihan untuk Periode {{ $period->name }}</h1>
    <p class="text-lg font-normal text-gray-900 dark:text-white mb-4">Tahun Periode: {{ $period->start_date }} / {{ $period->end_date }}</p>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        Nama Kandidat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Suara
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidatesWithVotes as $candidate)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        {{ $candidate->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $candidate->total_votes }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection


<!-- <table class="table">
    <thead>
        <tr>
            <th>Nama Kandidat</th>
            <th>Total Suara</th>
        </tr>
    </thead>
    <tbody>
        @foreach($candidatesWithVotes as $candidate)
        <tr>
            <td>{{ $candidate->name }}</td>
            <td>{{ $candidate->total_votes }}</td>
        </tr>
        @endforeach
    </tbody>
</table> -->