@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow p-6 rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Absensi Karyawan</h2>

    @if(session('success'))
        <div class="p-3 mb-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="p-3 mb-3 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
    @endif

    <div class="flex gap-4 mb-6">
        <form method="POST" action="{{ route('absen.masuk') }}">
            @csrf
            <button type="submit" class="bg-blue-500 px-4 py-2 text-white rounded hover:bg-blue-600">
                Absen Masuk
            </button>
        </form>

        <form method="POST" action="{{ route('absen.pulang') }}">
            @csrf
            <button type="submit" class="bg-green-500 px-4 py-2 text-white rounded hover:bg-green-600">
                Absen Pulang
            </button>
        </form>
    </div>

    <h3 class="text-xl font-semibold mb-3">Riwayat Absensi</h3>

    <table class="w-full border text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Masuk</th>
                <th class="p-2 border">Pulang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absen as $row)
                <tr>
                    <td class="p-2 border">{{ $row->tanggal }}</td>
                    <td class="p-2 border">{{ $row->masuk ?? '-' }}</td>
                    <td class="p-2 border">{{ $row->pulang ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
