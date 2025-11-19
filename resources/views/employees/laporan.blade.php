@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">

    <h2 class="text-xl font-bold mb-4">Upload Laporan Bulanan</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('employees.laporan.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block font-medium mb-1">Pilih Bulan</label>
        <select name="bulan" class="w-full border p-2 rounded mb-4" required>
            <option value="">-- Pilih Bulan --</option>
            @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                <option value="{{ $bulan }}">{{ $bulan }}</option>
            @endforeach
        </select>

        <label class="block font-medium mb-1">Upload File (PDF/DOC/DOCX)</label>
        <input type="file" name="file" class="w-full border p-2 rounded mb-4" required>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Upload
        </button>
    </form>

</div>
@endsection
