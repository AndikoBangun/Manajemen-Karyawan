<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function form()
    {
        return view('employees.laporan');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string',
            'file' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        $path = $request->file('file')->store('laporan', 'public');

        Laporan::create([
            'user_id' => Auth::id(),
            'bulan' => $request->bulan,
            'file' => $path
        ]);

        return back()->with('success', 'Laporan berhasil dikirim!');
    }
}
