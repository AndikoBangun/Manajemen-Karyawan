@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-gray-600 font-semibold mb-2">Total Karyawan</h2>
    <p class="text-3xl font-bold text-blue-600">{{ $totalKaryawan }}</p>
  </div>

  <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-gray-600 font-semibold mb-2">Laporan Diserahkan</h2>
    <p class="text-3xl font-bold text-green-600">{{ $laporanDiserahkan }}</p>
  </div>

  <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-gray-600 font-semibold mb-2">Absen Hari Ini</h2>
    <p class="text-3xl font-bold text-yellow-600">{{ $absenHariIni }}</p>
  </div>
</div>


<div class="mt-10 bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4">📄 Laporan Bulanan Karyawan</h3>

    @if($laporan->isEmpty())
        <p class="text-gray-500">Belum ada karyawan yang mengumpulkan laporan.</p>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Nama Karyawan</th>
                    <th class="px-4 py-3 text-left font-semibold">Bulan</th>
                    <th class="px-4 py-3 text-left font-semibold">Tanggal Upload</th>
                    <th class="px-4 py-3 text-center font-semibold">File</th>
                </tr>
            </thead>

            <tbody>
                @foreach($laporan as $lap)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $lap->user->name }}</td>
                    <td class="px-4 py-3 capitalize">{{ $lap->bulan }}</td>
                    <td class="px-4 py-3">{{ $lap->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ asset('storage/laporan/'.$lap->file) }}"
                           target="_blank"
                           class="px-3 py-1 text-xs bg-blue-600 text-white rounded hover:bg-blue-700">
                           Download
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
