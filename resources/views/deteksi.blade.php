<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pratinjau Gambar - DRAGO</title>
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
                        drago: '#8e035b',
                        highlight: '#1abc9c'
                    }
                }
            }
        }
    </script>
</head>
<body class="font-urbanist bg-white min-h-screen">

    <!-- Navbar -->
    <nav class="flex items-center justify-between bg-drago text-white p-4">
        <div class="flex items-center gap-2">
            <img src="{{ asset('buahnaga.png') }}" alt="Buah Naga" class="w-11 h-11">
            <h1 class="text-2xl font-bold tracking-normal" style="color: #FFD9A8">DRAGO</h1>
        </div>
        <div class="flex gap-6 text-lg font-semibold">
            <a href="{{ route('berandapetani') }}" class="hover:underline {{ request()->is('berandapetani') ? 'text-green-800' : 'text-white' }}">Home</a>
            <a href="{{ route('deteksi') }}" class="hover:underline {{ request()->is('deteksi') ? 'text-green-800' : 'text-white' }}">Deteksi</a>
            <a href="#" class="hover:underline">Jadwal</a>
            <a href="#" class="hover:underline">Laporan</a>
            <a href="{{ route('akunpetani') }}" class="hover:underline {{ request()->is('akunpetani') ? 'text-green-800' : 'text-white' }}">Akun</a>
        </div>
    </nav>

    <!-- Konten -->
    <main class="flex flex-col items-center justify-center p-8">
        <h2 class="text-4xl font-extrabold mb-4 text-black">Pratinjau Gambar</h2>

        @if(session('uploaded_image'))
            <img src="{{ asset('storage/' . session('uploaded_image')) }}" alt="Gambar yang Diunggah" class="w-[300px] h-auto object-contain rounded-lg shadow-md mb-6">
        @else
            <p class="text-red-600 font-semibold">Tidak ada gambar yang diunggah.</p>
        @endif

        <div class="flex gap-4">
            <!-- Tombol "Upload Gambar" -->
            <form action="{{ route('deteksi.hasil') }}" method="POST">
                @csrf
                <input type="hidden" name="image_path" value="{{ session('uploaded_image') }}">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold transition">
                    Upload Gambar
                </button>
            </form>

            <!-- Tombol "Batal" -->
            <a href="{{ route('deteksi') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition text-center">
                Batal
            </a>
        </div>
    </main>

</body>
</html>
