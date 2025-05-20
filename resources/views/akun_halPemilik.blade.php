<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akun - DRAGO</title>
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
            <a href="{{ route('berandapemilik') }}" class="{{ request()->is('berandapemilik') ? 'text-green-800' : 'text-white' }} hover:underline">Home</a>
            <a href="#" class="hover:underline">Penjadwalan</a>
            <a href="#" class="hover:underline">Laporan</a>
            <a href="{{ route('akun_HalPemilik') }}" class="{{ request()->is('akun_HalPemilik') ? 'text-green-800' : 'text-white' }} hover:underline">Akun</a>
        </div>
    </nav>

    <!-- Konten Akun -->
    <main class="flex flex-col items-center justify-center p-8">
        <img src="{{ asset('user.png') }}" alt="Foto Profil" class="w-24 h-24 rounded-full mb-4">
        <h2 class="text-2xl font-semibold mb-8">{{ $nama }}</h2>

        <div class="flex flex-col gap-4 w-full max-w-xs">
            <a href="{{ route('akunPribadi_halPemilik') }}"
            class="{{ request()->is('akunPribadi_HalPemilik')
                 ? 'flex items-center justify-between bg-drago px-6 py-4 rounded-xl hover:bg-pink-900 transition text-white'
                 : 'flex items-center justify-between bg-drago px-6 py-4 rounded-xl hover:bg-pink-900 transition text-white' }}">
                             <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A11.955 11.955 0 0112 15c2.5 0 4.847.776 6.879 2.097M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Data Akun Pribadi</span>
                </div>
                <span>›</span>
            </a>

            <a href="{{ route('akunpetani_halPemilik') }}"
            class="{{ request()->is('akunpetani_HalPemilik')
                 ? 'flex items-center justify-between bg-drago px-6 py-4 rounded-xl hover:bg-pink-900 transition text-white'
                 : 'flex items-center justify-between bg-drago px-6 py-4 rounded-xl hover:bg-pink-900 transition text-white' }}">                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-3.87M9 20h6M4 20h5v-2a4 4 0 00-5-3.87M8 4a4 4 0 11-8 0 4 4 0 018 0zm16 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span>Data Akun Petani</span>
                </div>
                <span>›</span>
            </a>
        </div>
    </main>

</body>
</html>
