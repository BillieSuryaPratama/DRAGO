@extends("layouts.appPemilik")

@section("content")
<main class="p-6">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-5xl mx-auto">
        <div class="flex justify-between items-start">
            <div class="flex items-center gap-4">
                <img src="{{ asset('user.png') }}" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $petani->Nama }}</h3>
                    <p class="text-gray-600 text-lg">{{ $petani->Email }}</p>
                </div>
            </div>
            <form id="deleteForm" action="{{ route('hapusAkun', $petani->ID_Akun) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" id="deleteButton" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">
                    Hapus Akun
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div>
                <label class="block font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" value="{{ $petani->Nama }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                <label class="block font-semibold text-gray-700 mt-4">Alamat</label>
                <input type="text" value="{{ $petani->Alamat }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>

                <label class="block font-semibold text-gray-700 mt-4">No HP</label>
                <input type="text" value="{{ $petani->Nomor_HP }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1" disabled>
            </div>

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

    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative bg-white rounded-lg shadow-lg p-6 max-w-sm w-full z-50">
            <h2 class="text-lg font-bold mb-4">Konfirmasi Penghapusan Akun</h2>
            <p>Anda yakin ingin menghapus akun ini?</p>
            <div class="flex justify-end mt-4">
                <button id="cancelDelete" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Tidak</button>
                <button id="confirmDelete" class="bg-red-600 text-white px-4 py-2 rounded">Ya</button>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const logoutBtn = document.getElementById('deleteButton');
        const modal = document.getElementById('deleteModal');
        const cancelBtn = document.getElementById('cancelDelete');
        const confirmBtn = document.getElementById('confirmDelete');
        const deleteForm = document.getElementById('deleteForm');

        logoutBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            window.location.href = "{{ route('showHalPetani') }}";
        });

        confirmBtn.addEventListener('click', () => {
            deleteForm.submit();
        });
    });
</script>

@endsection
