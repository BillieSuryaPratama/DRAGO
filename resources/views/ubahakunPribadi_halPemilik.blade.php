<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Akun - DRAGO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        .bg-drago {
            background-color: #8B005D;
        }
    </style>
</head>
<body class="font-urbanist bg-black min-h-screen">

    <!-- Navbar -->
    <nav class="flex items-center justify-between bg-drago text-white p-4">
        <div class="flex items-center gap-2">
            <img src="{{ asset('buahnaga.png') }}" alt="Buah Naga" class="w-11 h-11">
            <h1 class="text-2xl font-bold tracking-normal" style="color: #FFD9A8">DRAGO</h1>
        </div>
    </nav>

    <!-- Konten Edit Akun -->
    <main class="p-6 bg-white rounded-b-xl">

        <form action="{{ route('akunpribadi.update') }}" method="POST" class="max-w-5xl mx-auto mt-6">
            @csrf
            {{-- @method('PUT') --}}
            <!-- Avatar -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('user.png') }}" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md">
            </div>

            <!-- Form Fields -->
            <div class="bg-white shadow-md rounded-lg p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kiri -->
                    <div>
                        <label class="block font-semibold text-gray-700">Nama Lengkap</label>
                        <input type="text" name="Nama" value="{{ old('Nama', $akun->Nama) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Alamat</label>
                        <input type="text" name="Alamat" value="{{ old('Alamat', $akun->Alamat) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">No.Hp</label>
                        <input type="text" name="Nomor_HP" value="{{ old('Nomor_HP', $akun->Nomor_HP) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    </div>

                    <!-- Kanan -->
                    <div>
                        <label class="block font-semibold text-gray-700">Username</label>
                        <input type="text" name="Username" value="{{ old('Username', $akun->Username) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Email</label>
                        <input type="email" name="Email" value="{{ old('Email', $akun->Email) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Sandi</label>
                        <input type="text" name="Sandi" value="{{ old('Sandi', $akun->Sandi) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    </div>
                </div>

                <div class="flex justify-end mt-8">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-5 py-2 rounded">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </main>
</body>

<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        const form = e.target;

        // Ambil nilai input
        const nama = form.Nama.value.trim();
        const alamat = form.Alamat.value.trim();
        const noHp = form.Nomor_HP.value.trim();
        const username = form.Username.value.trim();
        const email = form.Email.value.trim();
        const sandi = form.Sandi.value.trim();

        // Cek apakah semua data terisi
        if (!nama || !alamat || !noHp || !username || !email || !sandi) {
            e.preventDefault();
            alert("Data wajib diisi");
            return;
        }

        // Validasi format
        const noHpRegex = /^[0-9]{8,20}$/;
        const usernameRegex = /^[a-zA-Z0-9_]{4,20}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const sandiRegex = /^.{6,12}$/

        if (!noHpRegex.test(noHp) || !usernameRegex.test(username) || !emailRegex.test(email) || !sandiRegex.test(sandi)) {
            e.preventDefault();
            alert("Format data harus sesuai");
            return;
        }

        // Jika valid, tampilkan pesan sukses (opsional bisa pakai confirm juga)
        alert("Data berhasil diubah");
    });
</script>

</html>
