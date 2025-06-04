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
            <a href="" class="">Edit</a>
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
            <form id="logoutForm" action="" method="" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded">
                    Logout
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
