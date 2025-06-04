@extends(session('id_jabatan') == 1 ? 'layouts.appPemilik' : 'layouts.appPetani')

@section("content")
<main class="p-6">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-5xl mx-auto">
        <div class="flex justify-between items-start">
            <div class="flex items-center gap-4">
                <img src="{{ asset('user.png') }}" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $akun->Nama }}</h3>
                    <p class="text-gray-600 text-lg">{{ $akun->Email }}</p>
                </div>
            </div>
            <a href="{{ route('showHalFormUbahData', $akun->ID_Akun) }}" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Edit</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div>
                <label class="block font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" value="{{ $akun->Nama }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                <label class="block font-semibold text-gray-700 mt-4">Alamat</label>
                <input type="text" value="{{ $akun->Alamat }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                <label class="block font-semibold text-gray-700 mt-4">No.Hp</label>
                <input type="text" value="{{ $akun->Nomor_HP }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>
            </div>
            <div>
                <label class="block font-semibold text-gray-700">Username</label>
                <input type="text" value="{{ $akun->Username }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                <label class="block font-semibold text-gray-700 mt-4">Email</label>
                <input type="text" value="{{ $akun->Email }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                <label class="block font-semibold text-gray-700 mt-4">Sandi</label>
                <input type="text" value="{{ $akun->Sandi }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>
            </div>
        </div>

        <div class="flex justify-center mt-8">
            <form id="logoutForm" action="{{ route('Logout') }}" method="POST" class="inline">
                @csrf
                <button type="button" id="logoutButton" class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded">
                    LogOut
                </button>
            </form>
        </div>
    </div>

    <div id="logoutModal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative bg-white rounded-lg shadow-lg p-6 max-w-sm w-full z-50">
            <h2 class="text-lg font-bold mb-4">Konfirmasi LogOut</h2>
            <p>Apakah Anda yakin ingin keluar?</p>
            <div class="flex justify-end mt-4">
                <button id="cancelLogout" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Tidak</button>
                <button id="confirmLogout" class="bg-red-600 text-white px-4 py-2 rounded">LogOut</button>
            </div>
        </div>
    </div>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const logoutBtn = document.getElementById('logoutButton');
        const modal = document.getElementById('logoutModal');
        const cancelBtn = document.getElementById('cancelLogout');
        const confirmBtn = document.getElementById('confirmLogout');
        const logoutForm = document.getElementById('logoutForm');

        logoutBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        confirmBtn.addEventListener('click', () => {
            logoutForm.submit();
        });
    });
</script>
@endsection
