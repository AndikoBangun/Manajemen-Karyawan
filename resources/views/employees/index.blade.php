@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Data Karyawan</h2>

    @if(Auth::user()->role == 'admin')
    <a href="{{ route('employees.create') }}" 
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mb-4 inline-block">
       + Tambah Karyawan
    </a>
    @endif

    <table class="w-full border border-gray-200 rounded-md shadow-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">Jabatan</th>
                <th class="px-4 py-2 text-left">Divisi</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">No HP</th>
                <th class="px-4 py-2 text-left">Gaji</th>
                <th class="px-4 py-2 text-left">Tanggal Masuk</th>

                @if(Auth::user()->role == 'admin')
                <th class="px-4 py-2 text-center">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $employee->nama }}</td>
                <td class="px-4 py-2">{{ $employee->jabatan }}</td>
                <td class="px-4 py-2">{{ $employee->divisi }}</td>
                <td class="px-4 py-2">{{ $employee->email }}</td>
                <td class="px-4 py-2">{{ $employee->no_hp }}</td>
                <td class="px-4 py-2">Rp. {{ $employee->gaji }}</td>
                <td class="px-4 py-2">{{ $employee->tanggal_masuk }}</td>

                @if(Auth::user()->role == 'admin')
                <td class="px-4 py-2 text-center">
                    <a href="{{ route('employees.edit', $employee->id) }}" 
                       class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-600 hover:underline"
                                onclick="return confirm('Yakin ingin menghapus?')">
                            Hapus
                        </button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
