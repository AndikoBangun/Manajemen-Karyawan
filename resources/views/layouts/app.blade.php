{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Manajemen Karyawan' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-xl font-bold mb-6">Menu</h2>

            @if(Auth::user()->role == 'admin')
                <a href="{{ route('dashboard.admin') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Dashboard</a>
                <a href="{{ route('employees.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Data Karyawan</a>
                <a href="{{ route('employees.create') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Tambah Karyawan</a>
                <a href="{{ route('absensi.admin') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Absensi Karyawan</a>
            @endif


            @if(Auth::user()->role == 'karyawan')
                <a href="{{ route('karyawan.dashboard') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Dashboard</a>
                <a href="{{ route('profile.show') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Profil Saya</a>
                <a href="{{ route('absensi.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Absensi </a>
                <a href="{{ route('employees.laporan.form') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Laporan </a>
            @endif

            <a href="/logout" class="block py-2 px-3 hover:bg-red-600 rounded">Logout</a>

        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
