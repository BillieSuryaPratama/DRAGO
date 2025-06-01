@php
    $mode = request()->get('mode', 'Lupa Password');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DRAGO - Lupa Password</title>
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

        function validateForm(event) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (!username || !password) {
                event.preventDefault(); // Mencegah form dari pengiriman
                alert('Username dan password wajib diisi');
            }
        }
    </script>
</head>

<body class="font-urbanist">
    <div class="flex min-h-screen">
        <div class="w-1/2 bg-drago flex flex-col items-center justify-center text-center text-white p-10">
            <img src="{{ asset('buahnaga.png') }}" alt="Buah Naga" class="w-72 mb-6">
            <h1 class="text-4xl font-bold tracking-widest text-yellow-200">DRAGO</h1>
        </div>

        <div class="w-1/2 bg-white flex flex-col items-center justify-center p-10">
            @if ($mode === 'Lupa Password')
                <h2 class="text-2xl font-bold text-gray-700 mb-4">Lupa Password</h2>

                @if ($errors->any())
                    <div class="mb-4 text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('ubahPassword') }}" class="w-full max-w-sm space-y-4" onsubmit="validateForm(event)">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm text-gray-600 mb-1">Username</label>
                        <input type="text" id="username" name="username" class="w-full border border-green-500 rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm text-gray-600 mb-1">Password Baru</label>
                        <input type="password" id="password" name="password" class="w-full border border-green-500 rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label for="konfirmasi_password" class="block text-sm text-gray-600 mb-1">Konfirmasi Password</label>
                        <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="w-full border border-green-500 rounded px-3 py-2" required>
                    </div>
                    <button type="submit" class="w-full bg-drago text-white py-2 rounded hover:bg-pink-900 transition">Ubah Password</button>
                </form>

                <div class="w-full max-w-sm mt-3">
                    <a href="{{ route('showHalLogin') }}" class="w-full block bg-red-500 text-white py-2 rounded hover:bg-red-600 transition text-center">Kembali</a>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
