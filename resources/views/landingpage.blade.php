<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DRAGO - Deteksi Penyakit Batang Buah Naga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        urbanist: ['Urbanist', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="text-white min-h-screen flex bg-[#860752] font-urbanist relative">
    <a href="{{ route('showHalLogin') }}" class="absolute top-6 right-6 text-white hover:underline z-10">Login</a>

    <div class="flex flex-row w-full px-6 pt-10 gap-10">
        <div class="flex flex-col items-center space-y-2">
            <h1 class="text-9xl font-bold text-yellow-200">D</h1>
            <h1 class="text-9xl font-bold text-yellow-200">R</h1>
            <h1 class="text-9xl font-bold text-yellow-200">A</h1>
            <h1 class="text-9xl font-bold text-yellow-200">G</h1>
            <h1 class="text-9xl font-bold text-yellow-200">O</h1>
        </div>

        <div class="flex flex-col items-center">
            <h2 class="text-lg font-bold text-yellow-200 mb-4">Hasil Deteksi Terbaru</h2>
            <div class="flex flex-col gap-4">
                @foreach($deteksiPenyakit as $deteksi)
                <div class="bg-white rounded-lg shadow-md p-4 w-40">
                    <img src="data:image/jpeg;base64,{{ base64_encode($deteksi->Gambar_Deteksi) }}" alt="Gambar Deteksi {{ $deteksi->Nama_Penyakit }}" class="w-full h-32 object-cover rounded-md mb-2">
                    <h3 class="text-sm text-black font-semibold text-center">{{ $deteksi->Nama_Penyakit }}</h3>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex-1 flex flex-col items-center justify-center text-center">
            <img src="buahnaga.png" alt="Buah Naga" class="w-60 md:w-80 mb-6">
            <div class="text-sm md:text-lg text-[#34FC34]">
                <p>Selamat Datang</p>
                <p>Sistem Pendeteksi Penyakit Batang pada Buah Naga</p>
            </div>
        </div>

    </div>
</body>
</html>
