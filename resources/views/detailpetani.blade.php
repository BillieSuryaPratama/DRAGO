<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DRAGO</title>
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
    <main class="p-6">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-5xl mx-auto">
            <div class="flex justify-between items-start">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('user.png') }}" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover">
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $petani->Nama }}</h3>
                        <p class="text-gray-600 text-lg">{{ $petani->Username}}</p>
                    </div>
                </div>
                <form id="hapusForm" method="POST" action="{{ route('hapusAkun', ['id' => $petani->ID_Akun]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">
                        Hapus Akun
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <!-- Kiri -->
                <div>
                    <label class="block font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" value="{{ $petani->Nama }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                    <label class="block font-semibold text-gray-700 mt-4">Alamat</label>
                    <input type="text" value="{{ $petani->Alamat }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                    <label class="block font-semibold text-gray-700 mt-4">No HP</label>
                    <input type="text" value="{{ $petani->Nomor_HP }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>
                </div>

                <!-- Kanan -->
                <div>
                    <label class="block font-semibold text-gray-700">Username</label>
                    <input type="text" value="{{ $petani->Username}}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                    <label class="block font-semibold text-gray-700 mt-4">Email</label>
                    <input type="text" value="{{ $petani->Email}}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                    <label class="block font-semibold text-gray-700 mt-4">Sandi</label>
                    <input type="text" value="{{ $petani->Sandi }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>
                    <label class="block font-semibold text-gray-700 mt-4">Status</label>
                    <input type="text"
                    value="{{ $petani->Status_Akun == 1 ? 'Aktif' : 'Tidak Aktif' }}"
                    class="w-full border border-pink-600 rounded px-3 py-2 mt-1"
                    disabled>
                    </div>
            </div>
        </div>
    </main>
</body>

<script>
    document.getElementById('hapusForm').addEventListener('submit', function(event) {
        const confirmed = confirm('Apakah Anda yakin ingin menghapus akun ini?');
        if (!confirmed) {
            event.preventDefault();
            window.location.href = "{{ route('akunpetani_halPemilik') }}"; // Redirect manual
        }
    });
</script>

</html>
