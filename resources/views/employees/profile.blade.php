@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8 mt-10">
    <h2 class="text-2xl font-semibold text-gray-800 border-b pb-4 mb-6">Profil Saya</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm text-gray-500">Nama</p>
            <p class="text-lg font-medium text-gray-900">{{ $employee->nama }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Jabatan</p>
            <p class="text-lg font-medium text-gray-900">{{ $employee->jabatan }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Divisi</p>
            <p class="text-lg font-medium text-gray-900">{{ $employee->divisi }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Email</p>
            <p class="text-lg font-medium text-gray-900">{{ $employee->email }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">No HP</p>
            <p class="text-lg font-medium text-gray-900">{{ $employee->no_hp }}</p>
        </div>
                <div>
            <p class="text-sm text-gray-500">Gaji</p>
            <p class="text-lg font-medium text-gray-900">Rp. {{ $employee->gaji }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Tanggal Masuk</p>
            <p class="text-lg font-medium text-gray-900">{{ $employee->tanggal_masuk ?? '-' }}</p>
        </div>
    </div>

    <div class="flex justify-end mt-8">
        <a href="{{ route('profile.edit') }}" 
           class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
           Edit Profil
        </a>
    </div>
</div>
@endsection
