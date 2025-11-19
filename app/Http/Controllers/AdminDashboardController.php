<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use App\Models\Laporan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Hitung statistik dashboard
        $totalKaryawan = User::where('role', 'karyawan')->count();
        $laporanDiserahkan = Laporan::count();
        $absenHariIni = Absensi::where('tanggal', date('Y-m-d'))->count();

        // Ambil semua laporan bulanan untuk tabel di dashboard
        $laporan = Laporan::with('user')->latest()->get();

        return view('dashboard.admin', compact(
            'totalKaryawan',
            'laporanDiserahkan',
            'absenHariIni',
            'laporan'
        ));
    }
}
