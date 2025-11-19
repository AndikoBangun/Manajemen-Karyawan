<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Karyawan - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg">
      <div class="p-6 border-b">
        <h2 class="text-xl font-semibold text-blue-600">Admin Panel</h2>
      </div>
      <nav class="mt-4">
        <a href="#" class="block py-2.5 px-6 hover:bg-blue-50 hover:text-blue-600">Dashboard</a>
        <a href="{{ route('employees.index') }}" class="block py-2.5 px-6 bg-blue-50 text-blue-600 font-medium">Data Karyawan</a>
        <a href="#" class="block py-2.5 px-6 hover:bg-blue-50 hover:text-blue-600">Absensi</a>
      </nav>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-8 overflow-y-auto">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Daftar Karyawan</h1>
        <a href="{{ route('employees.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">+ Tambah Karyawan</a>
      </div>

      <div class="bg-white shadow rounded-xl p-6">
        <table class="min-w-full border border-gray-200 text-sm">
          <thead class="bg-gray-50">
            <tr>
              <th class="py-2 px-4 border-b text-left">No</th>
              <th class="py-2 px-4 border-b text-left">Nama</th>
              <th class="py-2 px-4 border-b text-left">Jabatan</th>
              <th class="py-2 px-4 border-b text-left">Divisi</th>
              <th class="py-2 px-4 border-b text-left">Email</th>
              <th class="py-2 px-4 border-b text-left">No HP</th>
              <th class="py-2 px-4 border-b text-left">Tanggal Masuk</th>
              <th class="py-2 px-4 border-b text-left">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $e)
            <tr class="hover:bg-gray-50">
              <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
              <td class="py-2 px-4 border-b">{{ $e->nama }}</td>
              <td class="py-2 px-4 border-b">{{ $e->jabatan }}</td>
              <td class="py-2 px-4 border-b">{{ $e->divisi }}</td>
              <td class="py-2 px-4 border-b">{{ $e->email }}</td>
              <td class="py-2 px-4 border-b">{{ $e->no_hp }}</td>
              <td class="py-2 px-4 border-b">{{ $e->tanggal_masuk }}</td>
              <td class="py-2 px-4 border-b flex gap-2">
                <a href="{{ route('employees.edit', $e->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 text-xs">Edit</a>
                <form action="{{ route('employees.destroy', $e->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 text-xs">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
