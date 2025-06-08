@extends("layouts.appPemilik")

@section("content")
<main class="p-6 bg-white rounded-b-xl">
    <form action="{{ route("SimpanJadwal") }}" method="POST" class="max-w-5xl mx-auto mt-6">
        @csrf
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
                    <label class="block font-semibold text-gray-700">Nama</label>
                    <select name="ID_Akun" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                        <option value="">Pilih Petani</option>
                        @foreach ($petani as $p)
                            <option value="{{ $p->ID_Akun }}">{{ $p->Nama }}</option>
                        @endforeach
                    </select>

                    <label class="block font-semibold text-gray-700 mt-4">Jam Mulai</label>
                    <input type="datetime-local" name="JamMulai" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                    <label class="block font-semibold text-gray-700 mt-4">Jam Berakhir</label>
                    <input type="datetime-local" name="JamBerakhir" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700">Tanggal</label>
                    <input type="date" name="Tanggal" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                    <label class="block font-semibold text-gray-700 mt-4">Kegiatan</label>
                    <input type="text" name="Kegiatan" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-5 py-2 rounded">Simpan</button>
            </div>
        </div>
    </form>
</main>
@endsection
