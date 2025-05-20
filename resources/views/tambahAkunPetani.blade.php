<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Akun Petani - DRAGO</title>
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
    <main class="p-6 bg-white rounded-b-xl">

        <form action="{{ route('tambahAkunPetani.simpan') }}" method="POST" class="max-w-5xl mx-auto mt-6">
            @csrf
            <div class="flex justify-center mb-6">
                <img src="{{ asset('user.png') }}" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md">
            </div>
            <div class="bg-white shadow-md rounded-lg p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kiri -->
                    <div>
                        <label class="block font-semibold text-gray-700">Nama Lengkap</label>
                        <input type="text" name="Nama" value="{{ old('Nama') }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Alamat</label>
                        <input type="text" name="Alamat" value="{{ old('Alamat') }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">No.Hp</label>
                        <input type="text" name="Nomor_HP" value="{{ old('Nomor_HP') }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    </div>

                    <!-- Kanan -->
                    <div>
                        <label class="block font-semibold text-gray-700">Username</label>
                        <input type="text" name="Username" value="{{ old('Username') }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Email</label>
                        <input type="email" name="Email" value="{{ old('Email') }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Sandi</label>
                        <input type="text" name="Sandi" value="{{ old('Sandi') }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
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
document.querySelector('form').addEventListener('submit', function(e) {
    const nama = document.querySelector('input[name="Nama"]');
    const alamat = document.querySelector('input[name="Alamat"]');
    const nomorHp = document.querySelector('input[name="Nomor_HP"]');
    const username = document.querySelector('input[name="Username"]');
    const email = document.querySelector('input[name="Email"]');
    const sandi = document.querySelector('input[name="Sandi"]');

    const noHpRegex = /^[0-9]{8,20}$/;
    const usernameRegex = /^[a-zA-Z]{4,20}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const sandiRegex = /^.{6,12}$/;

    // Cek apakah ada field kosong
    if (
        !nama.value.trim() || !alamat.value.trim() || !nomorHp.value.trim() ||
        !username.value.trim() || !email.value.trim() || !sandi.value.trim()
    ) {
        e.preventDefault();
        alert("Data wajib diisi");
        [nama, alamat, nomorHp, username, email, sandi].forEach(input => {
            if (!input.value.trim()) input.classList.add('border-red-500');
        });
        return;
    }

    // Cek format data
    if (!noHpRegex.test(nomorHp.value) || !usernameRegex.test(username.value) ||
        !emailRegex.test(email.value) || !sandiRegex.test(sandi.value)) {
        e.preventDefault();
        alert("Format data harus sesuai");

        if (!noHpRegex.test(nomorHp.value)) nomorHp.classList.add('border-red-500');
        if (!usernameRegex.test(username.value)) username.classList.add('border-red-500');
        if (!emailRegex.test(email.value)) email.classList.add('border-red-500');
        if (!sandiRegex.test(sandi.value)) sandi.classList.add('border-red-500');
        return;
    }

    // Jika semua oke, tampilkan alert berhasil
    alert("Akun Berhasil ditambahkan");
});
</script>


</html>
