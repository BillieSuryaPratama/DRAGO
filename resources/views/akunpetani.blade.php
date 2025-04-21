<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akun Petani - DRAGO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        urbanist: ['Urbanist', 'sans-serif']
                    },
                    colors: {
                        drago: '#8e035b'
                    }
                }
            }
        }
    </script>
</head>
<body class="font-urbanist bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="flex items-center justify-between bg-drago text-white p-4">
        <div class="flex items-center gap-2">
            <img src="buahnaga.png" alt="Buah Naga" class="w-11 h-11">
            <h1 class="text-2xl font-bold tracking-normal" style="color: #FFD9A8">DRAGO</h1>
        </div>
        <div class="flex gap-6 text-lg font-semibold">
            <a href="berandapetani.php" class="nav-link hover:underline">Home</a>
            <a href="deteksi.php" class="nav-link hover:underline">Deteksi</a>
            <a href="jadwal.php" class="nav-link hover:underline">Jadwal</a>
            <a href="laporanpetani.php" class="nav-link hover:underline">Laporan</a>
            <a href="akunpetani.php" class="nav-link hover:underline">Akun</a>
        </div>
    </nav>

    <!-- Konten Akun -->
    <main class="p-6">
        <h2 class="text-xl text-gray-600 mb-4">Akun/Melihat Data Petani-Pribadi</h2>

        <div class="bg-white shadow-md rounded-lg p-8 max-w-5xl mx-auto">
            <div class="flex justify-between items-start">
                <div class="flex items-center gap-4">
                    <img src="foto_profile.jpg" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover">
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">Juan Adi</h3>
                        <p class="text-gray-600 text-lg">moontoni</p>
                    </div>
                </div>
                <button class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Edit</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <!-- Kiri -->
                <div>
                    <label class="block font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" value="Toni Montala" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                    <label class="block font-semibold text-gray-700 mt-4">Alamat</label>
                    <input type="text" value="Jl.52 Kalimantan, Sumbersari, Jember" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                    <label class="block font-semibold text-gray-700 mt-4">No.Hp</label>
                    <input type="text" value="081331622841" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>
                </div>

                <!-- Kanan -->
                <div>
                    <label class="block font-semibold text-gray-700">Username</label>
                    <input type="text" value="Juannnfrrr" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                    <label class="block font-semibold text-gray-700 mt-4">Email</label>
                    <input type="text" value="moon@gmail.com" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                    <label class="block font-semibold text-gray-700 mt-4">Sandi</label>
                    <input type="text" value="moon135." class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>
                </div>
            </div>

            <div class="flex justify-center mt-8">
                <button class="bg-red-700 hover:bg-red-800 text-white font-semibold px-6 py-2 rounded">Log Out</button>
            </div>
        </div>
    </main>
</body>
</html>
