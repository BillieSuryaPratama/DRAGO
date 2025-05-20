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
<body class="text-white min-h-screen flex" style="background-color: #860752">
    <div class="mb-150" style="background-color: #860752">
        <h1 class="font-urbanist text-9xl font-bold text-yellow-200" >
            D
        </h1>
        <h1 class="font-urbanist text-9xl font-bold text-yellow-200" >
            R
        </h1>
        <h1 class="font-urbanist text-9xl font-bold text-yellow-200" >
            A
        </h1>
        <h1 class="font-urbanist text-9xl font-bold text-yellow-200" >
            G
        </h1>
        <h1 class="font-urbanist text-9xl font-bold text-yellow-200" >
            O
        </h1>
    </div>

    <div class="flex-1 flex flex-col items-center justify-center relative text-center px-4">
        <a href="{{ url('/login') }}" class="font-urbanist tracking-widest absolute top-6 right-6 text-white hover:underline mr-7">Login</a>
        <img src="buahnaga.png" alt="Buah Naga" class="w-60 md:w-80 mb-6">
        <div class="text-sm md:text-lg font-urbanist" style="color: #34FC34">
            <p>Selamat Datang</p>
            <p>Sistem Pendeteksi Penyakit Batang pada Buah Naga</p>
        </div>
    </div>
</body>
</html>
