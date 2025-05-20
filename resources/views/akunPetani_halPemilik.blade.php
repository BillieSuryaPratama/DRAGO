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

    <div class="container flex justify-center">
        <div class="w-full max-w-4xl">
            @foreach($petanis as $petani)
            <div style="background-color:#ddd; border-radius: 10px; padding: 10px; margin-top:30px; margin-bottom: 15px; display: flex; align-items: center; ">
                <img src="{{ asset('user.png') }}" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 15px;">
                <div style="flex-grow: 1;">
                    <strong>{{ $petani->Nama }}</strong>
                </div>
                <a href="{{ route('detailpetani', ['id' => $petani->ID_Akun]) }}">

                    <button style="background-color: #4a90e2; color: white; border: none; padding: 5px 15px; border-radius: 5px;">
                        LIHAT
                    </button>
                </a>

            </div>
            @endforeach

            <div style="background-color: #eee; border-radius: 10px; padding: 20px; text-align: center; color: #888; cursor: pointer;">
                <a href="{{route('tambahakun')}}" style="text-decoration: none; color: #888;">
                    <strong>TAMBAHKAN AKUN PETANI +</strong>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
