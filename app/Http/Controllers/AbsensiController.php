<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    
    public function index()
{
    $userId = Auth::user()->id;
    $absen = Absensi::where('user_id', $userId)
                    ->orderBy('tanggal', 'desc')
                    ->get();

    return view('absensi.index', compact('absen'));
}

public function absenMasuk()
{
    $userId = Auth::user()->id;
    $today = date('Y-m-d');

    $cek = Absensi::where('user_id', $userId)
                  ->where('tanggal', $today)
                  ->first();

    if ($cek && $cek->masuk) {
        return back()->with('error', 'Anda sudah absen masuk!');
    }

    Absensi::updateOrCreate(
        ['user_id' => $userId, 'tanggal' => $today],
        ['masuk' => date('H:i:s')]
    );

    return back()->with('success', 'Absen masuk berhasil!');
}

public function absenPulang()
{
    $today = date('Y-m-d');
    $userId = Auth::user()->id;
    $cek = Absensi::where('user_id', $userId)
                  ->where('tanggal', $today)
                  ->first();

    if (!$cek || !$cek->masuk) {
        return back()->with('error', 'Anda belum absen masuk!');
    }

    if ($cek->pulang) {
        return back()->with('error', 'Anda sudah absen pulang!');
    }

    $cek->update(['pulang' => date('H:i:s')]);

    return back()->with('success', 'Absen pulang berhasil!');
}

}
