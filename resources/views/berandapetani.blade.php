<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Petani - DRAGO</title>
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
        <!-- Kiri: Logo dan Nama -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('buahnaga.png') }}" alt="Buah Naga" class="w-11 h-11">
            <h1 class="text-2xl font-bold tracking-normal" style="color: #FFD9A8">DRAGO</h1>
        </div>

        <!-- Kanan: Menu Navigasi -->
        <div class="flex gap-6 text-lg font-semibold">
            <a href="{{ route('berandapetani', ['id' => $petani->ID_Akun]) }}"
                class="nav-link hover:underline {{ request()->is('berandapetani') ? 'text-green-800' : 'text-white' }}">
                Home
            </a>
            <a href="{{ route('tambahgambar', ['id' => $petani->ID_Akun]) }}"
                class="nav-link hover:underline {{ request()->is('tambahgambar') ? 'text-green-800' : 'text-white' }}">
                Deteksi
            </a>
            <a href="" class="nav-link hover:underline ">
                Jadwal
            </a>
            <a href="" class="nav-link hover:underline">
                Laporan
            </a>
            <a href="{{ route('akunpetani', ['id' => $petani->ID_Akun]) }}" class="nav-link hover:underline {{ request()->is('akunpetani') ? 'text-green-800' : 'text-white' }}">
                Akun
            </a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="p-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Selamat Datang, Petani!</h2>
            <p class="text-gray-600">Silakan pilih menu di atas untuk mengelola sistem deteksi penyakit batang buah naga.</p>
        </div>
    </main>

</body>
</html>
