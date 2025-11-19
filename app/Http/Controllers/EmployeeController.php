<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'email' => 'required|email|unique:employees',
            'no_hp' => 'required',
            'gaji' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $user = User::create([
        'name' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make('password123'), 
        'role' => 'karyawan', 
        ]);

        Employee::create([
        'user_id' => $user->id,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'divisi' => $request->divisi,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'gaji' => $request->gaji,
        'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
         return view('employees.edit', compact('employee'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $employee = Employee::findOrFail($id);

    // Hapus juga user melalui relasi
    if ($employee->user) {
        $employee->user->delete();
    }

    $employee->delete();

    return redirect()->route('employees.index')->with('success', 'Karyawan dan user berhasil dihapus.');
}

public function showProfile()
{
    $employee = auth()->user()->employee; // relasi ke tabel employees
    return view('employees.profile', compact('employee'));
}

public function editProfile()
{
    $employee = auth()->user()->employee;
    return view('employees.edit-profile', compact('employee'));
}

public function updateProfile(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'no_hp' => 'nullable|string|max:15',
    ]);

    $employee = auth()->user()->employee;
    $employee->update($request->only(['nama', 'alamat', 'no_hp']));

    return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
}

}
