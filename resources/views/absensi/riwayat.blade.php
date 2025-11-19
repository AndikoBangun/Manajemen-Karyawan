@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 px-4">

    <h1 class="text-2xl font-bold mb-6">
        Riwayat Absensi: {{ $karyawan->name }}
    </h1>

    <a href="{{ url('/absensi/admin') }}"
        class="px-3 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm">
        ← Kembali
    </a>

    <div class="mt-6 bg-white shadow-lg rounded-lg border border-gray-200 overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Tanggal</th>
                    <th class="px-4 py-3 text-left font-semibold">Jam Masuk</th>
                    <th class="px-4 py-3 text-left font-semibold">Jam Pulang</th>
                    <th class="px-4 py-3 text-center font-semibold">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($riwayat as $absen)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}
                            {{-- Jika field tanggal tidak ada, ganti dengan $absen->created_at --}}
                        </td>

                        <td class="px-4 py-3">
                            {{ $absen->masuk ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $absen->pulang ?? '-' }}
                        </td>

                        <td class="px-4 py-3 text-center">
                            @if(!$absen->masuk)
                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-600">
                                    Belum Absen
                                </span>
                            @elseif(!$absen->pulang)
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                    Masih Bekerja
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                    Selesai
                                </span>
                            @endif
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-5 text-center text-gray-500">
                            Tidak ada riwayat absensi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
