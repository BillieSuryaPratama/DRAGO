<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Pemilik - DRAGO</title>
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
        <!-- Kiri: DRAGO dan Gambar Buah Naga -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('buahnaga.png') }}" alt="Buah Naga" class="w-11 h-11">
            <h1 class="text-2xl font-bold tracking-normal" style="color: #FFD9A8">DRAGO</h1>
        </div>

        <!-- Kanan: Tombol Navigasi -->
        <div class="flex gap-6 text-lg font-semibold">
            <a href="{{ route('berandapemilik') }}" class="hover:underline {{ request()->is('berandapemilik') ? 'text-green-800' : 'text-white' }}">Home</a>
            <a href="" class="hover:underline ">Penjadwalan</a>
            <a href="" class="hover:underline ">Laporan</a>
            <a href="{{ route('akun_HalPemilik') }}" class="hover:underline {{ request()->is('akun_HalPemilik') ? 'text-green-800' : 'text-white' }}">Akun</a>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main class="p-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Selamat Datang, Pemilik!</h2>
            <p class="text-gray-600">Silakan pilih menu di atas untuk mengelola sistem deteksi penyakit batang buah naga.</p>
        </div>
    </main>

</body>
</html>
