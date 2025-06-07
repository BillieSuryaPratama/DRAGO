@extends(session('id_jabatan') == 1 ? 'layouts.appPemilik' : 'layouts.appPetani')

@section("content")
<main class="p-6 bg-white rounded-b-xl">

        <form action="{{ route('SimpanPerubahan') }}" method="POST" class="max-w-5xl mx-auto mt-6">
            @csrf
            <div class="flex justify-center mb-6">
                <img src="{{ asset('user.png') }}" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md">
            </div>

            <div class="flex justify-center">
                @if ($errors->any())
                    <div class="mb-4 text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="bg-white shadow-md rounded-lg p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold text-gray-700">Nama Lengkap</label>
                        <input type="text" name="Nama" value="{{ old('Nama', $akun->Nama) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Alamat</label>
                        <input type="text" name="Alamat" value="{{ old('Alamat', $akun->Alamat) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">No.Hp</label>
                        <input type="text" name="Nomor_HP" value="{{ old('Nomor_HP', $akun->Nomor_HP) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700">Username</label>
                        <input type="text" name="Username" value="{{ old('Username', $akun->Username) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Email</label>
                        <input type="email" name="Email" value="{{ old('Email', $akun->Email) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                        <label class="block font-semibold text-gray-700 mt-4">Sandi</label>
                        <input type="text" name="Sandi" value="{{ old('Sandi', $akun->Sandi) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    </div>
                </div>

                <div class="flex justify-end mt-8">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-5 py-2 rounded">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </main>
@endsection
