@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">

    <h1 class="text-2xl font-bold mb-6">Daftar Absensi Karyawan ({{ $today }})</h1>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Nama</th>
                    <th class="px-4 py-3 text-left font-semibold">Absen Masuk</th>
                    <th class="px-4 py-3 text-left font-semibold">Absen Pulang</th>
                    <th class="px-4 py-3 text-center font-semibold">Status</th>
                    <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $karyawan)
                    @if($karyawan->role !== 'karyawan')
                        @continue
                    @endif

                    @php
                        $absen = $karyawan->absensi->first(); 
                    @endphp

                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <span class="font-medium">{{ $karyawan->name }}</span>
                        </td>

                        <td class="px-4 py-3">
                            @if($absen)
                                {{ $absen->masuk ?? '-' }}
                            @else
                                -
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            @if($absen)
                                {{ $absen->pulang ?? '-' }}
                            @else
                                -
                            @endif
                        </td>

                        <td class="px-4 py-3 text-center">
                            @if(!$absen)
                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-600">
                                    Belum Absen
                                </span>
                            @elseif($absen && !$absen->pulang)
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                    Masih Bekerja
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                    Selesai
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-center">
                            <a href="{{ url('absensi/admin'.$karyawan->id.'/riwayat') }}"
                               class="px-3 py-1 bg-blue-600 text-white rounded shadow hover:bg-blue-700 text-xs">
                                Lihat Riwayat
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
