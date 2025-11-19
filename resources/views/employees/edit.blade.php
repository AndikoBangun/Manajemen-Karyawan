@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit Data Karyawan</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Nama</label>
            <input type="text" name="nama" value="{{ $employee->nama }}" 
                   class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Jabatan</label>
            <input type="text" name="jabatan" value="{{ $employee->jabatan }}" 
                   class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Divisi</label>
            <input type="text" name="jabatan" value="{{ $employee->divisi }}" 
                   class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ $employee->email }}" 
                   class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">No HP</label>
            <input type="text" name="jabatan" value="{{ $employee->no_hp }}" 
                   class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Gaji</label>
            <input type="text" name="jabatan" value="{{ $employee->gaji }}" 
                   class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Tanggal Masuk</label>
            <input type="date" name="jabatan" value="{{ $employee->tanggal_masuk }}" 
                   class="w-full border-gray-300 rounded-md p-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Update
        </button>
        <a href="{{ route('employees.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
