<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAbsensiController extends Controller
{
    public function admin()
    {
        $today = date('Y-m-d');

        // Ambil semua karyawan + status absen hari ini
        $data = User::with(['absensi' => function($q) use ($today) {
            $q->where('tanggal', $today);
        }])->get();

        return view('absensi.admin', compact('data', 'today'));
    }

    public function riwayat($id)
    {
        $karyawan = User::findOrFail($id);
        $riwayat = Absensi::where('user_id', $id)
                        ->orderBy('tanggal', 'desc')
                        ->get();

        $today = date('Y-m-d'); // <-- tambahkan ini

        return view('absensi.riwayat', compact('karyawan', 'riwayat', 'today'));
    }

}
