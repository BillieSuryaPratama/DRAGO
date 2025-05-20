<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Deteksi Penyakit - DRAGO</title>
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
            <a href="{{ route('berandapetani', ['id' => $petani->ID_Akun]) }}" class="hover:underline {{ request()->is('berandapetani') ? 'text-green-800' : 'text-white' }}">Home</a>
            <a href="{{ route('tambahgambar', ['id' => $petani->ID_Akun]) }}" class="hover:underline {{ request()->is('tambahgambar') ? 'text-green-800' : 'text-white' }}">Deteksi</a>
            <a href="#" class="hover:underline">Jadwal</a>
            <a href="#" class="hover:underline">Laporan</a>
            <a href="{{ route('akunpetani', ['id' => $petani->ID_Akun]) }}" class="hover:underline {{ request()->is('akunpetani') ? 'text-green-800' : 'text-white' }}">Akun</a>
        </div>
    </nav>

    <!-- Konten -->
    <main class="flex flex-col items-center justify-center p-8">
        <h2 class="text-4xl font-extrabold mb-4 text-black">Unggah Foto!</h2>
        <h1 class="font-extrabold mb-4 text-black">Untuk Mengetahui Penyakit Batang Pada Buah Naga kamu.</h1>

        <div class="w-fit max-w-md text-center">
            <form action="{{ route('hasilDeteksi', ['id' => $petani->ID_Akun]) }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                @csrf
                <label for="imageInput" id="uploadLabel" class="cursor-pointer border-2 border-dashed border-gray-300 rounded-lg px-6 py-12 bg-gray-50 hover:bg-gray-100 flex flex-col items-center justify-center">
                    <img id="previewImage" src="" alt="Preview" class="hidden max-h-64 mb-4 rounded">
                    <div id="uploadIcon" class="text-4xl text-gray-400 font-light mb-2">+</div>
                    <p id="uploadText" class="text-gray-500">Unggah Foto</p>
                </label>
                <input id="imageInput" type="file" name="imagefile" accept="image/*" class="hidden" required>

                <div class="flex justify-center space-x-4 mt-6">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-20 py-2 rounded-lg font-semibold transition text-center">Mulai Deteksi</button>
                </div>
            </form>
        </div>

        <div class="flex gap-4 mt-5 ">
            <a href="{{ route('riwayatDeteksi', ['id' => $petani->ID_Akun]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-20 py-2 rounded-lg font-semibold transition text-center">
                Lihat Riwayat
            </a>
        </div>
    </main>

    <script>
        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById('previewImage');
        const uploadIcon = document.getElementById('uploadIcon');
        const uploadText = document.getElementById('uploadText');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    uploadIcon.classList.add('hidden');
                    uploadText.textContent = "Klik untuk ganti foto";
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
