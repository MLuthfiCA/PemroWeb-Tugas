<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-start justify-center p-6">

    <div class="w-full max-w-4xl">

        <!-- Judul -->
        <h1 class="text-3xl font-bold mb-6 text-center">
            Data User
        </h1>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="w-full border border-collapse table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center">Nama</th>
                        <th class="border px-4 py-2 text-center">Email</th>
                        <th class="border px-4 py-2 text-center">Kata sandi</th>
                        <th class="border px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user['name'] }}</td>
                            <td class="border px-4 py-2">{{ $user['email'] }}</td>
                            <td class="border px-4 py-2">{{ $user['password'] }}</td>
                            <td class="border px-4 py-2">

                                <div class="flex gap-2">

                                    <!-- Edit -->
                                    <a href="#"
                                       class="px-3 py-1 border text-sm">
                                        Edit
                                    </a>

                                    <!-- Hapus -->
                                    <form action="/admin/data_user/{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                        class="px-3 py-1 border text-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>