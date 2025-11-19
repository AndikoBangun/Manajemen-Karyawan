@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Tambah Karyawan</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nama</label>
            <input type="text" name="nama" class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Jabatan</label>
            <input type="text" name="jabatan" class="w-full border-gray-300 rounded-md p-2" required>
        </div>
         <div class="mb-4">
            <label class="block text-gray-700">Divisi</label>
            <input type="text" name="divisi" class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">No HP</label>
            <input type="text" name="no_hp" class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Gaji</label>
            <input type="text" name="gaji" class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
            Simpan
        </button>
        <a href="{{ route('employees.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
