@extends('layouts.app')

@section('title', 'Dashboard Karyawan')
@section('page_title', 'Dashboard Karyawan')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
  <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-gray-600 font-semibold mb-2">Status Kehadiran</h2>
    <p class="text-2xl font-bold text-green-600">Hadir</p>
  </div>

  <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-gray-600 font-semibold mb-2">Sisa Cuti</h2>
    <p class="text-2xl font-bold text-blue-600">5 Hari</p>
  </div>
</div>

<div class="mt-8 bg-white p-6 rounded-lg shadow">
  <h3 class="text-lg font-semibold mb-4">Informasi Terbaru</h3>
  <ul class="list-disc list-inside text-gray-700 space-y-2">
    <li>Meeting bulanan akan diadakan Jumat, 8 November 2025.</li>
    <li>Pastikan absensi sebelum pukul 09.00 pagi.</li>
    <li>Pengajuan cuti online hanya melalui sistem ini.</li>
  </ul>
</div>
@endsection
