@extends("layouts.appPetani")
@section("content")
<main class="bg-green-100 shadow-md w-1/2 rounded-lg p-10 mx-auto">
    <h2 class="text-center">TAMBAH LAPORAN</h2>
    <form action="{{ route('Simpan_laporan') }}" method="POST" class="max-w-5xl mx-auto mt-6">
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
        <div class="">
            <div class="justify-center items-center gap-6">
                <div>
                    <label class="block font-semibold text-gray-700">Jumlah Tumbuhan Sakit</label>
                    <input type="number" name="Jumlah_Tumbuhan_Sakit" value="" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    <label class="block font-semibold text-gray-700 mt-4">Jumlah Tumbuhan Sehat</label>
                    <input type="number" name="Jumlah_Tumbuhan_Sehat" value="" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    <label class="block font-semibold text-gray-700 mt-4">Keterangan</label>
                    <input type="text" name="Keterangan" value="" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    <label for="tanggal" class="block font-semibold text-gray-700 mt-4">Tanggal</label>
                    <input type="date" name="Tanggal_Laporan" class="border rounded p-2 w-full">
                </div>
            </div>
            <div class="flex justify-between mt-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-5 py-2 rounded">Simpan</button>
                <a href="{{ route('showHalLaporanPetani') }}" class="bg-red-500 hover:bg-red-600 text-white font-medium px-5 py-2 rounded text-center">
                    Batal
                </a>
            </div>
        </div>

    </form>
</main>
@endsection
