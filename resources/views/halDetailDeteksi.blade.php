@extends("layouts.appPetani")

@section("content")
<div class="container mx-auto bg-white shadow-lg rounded-lg p-6">
    <div class="bg-drago text-center py-4 rounded-md mb-6">
        <h2 class="text-2xl font-bold text-white">{{ $DetailPenyakit->Nama_Penyakit }} (Akurasi: {{ $DetailPenyakit->Akurasi }}%)</h2>
    </div>

    <div class="flex flex-col md:flex-row items-stretch gap-6 mb-6">
        <img src="data:image/jpeg;base64,{{ base64_encode($DetailPenyakit->Gambar_Deteksi) }}" alt="Gambar Deteksi {{ $DetailPenyakit->Nama_Penyakit }}" class="w-full md:w-1/3 max-w-xs rounded-lg shadow-md object-cover h-full">

        <div class="flex-grow bg-gray-100 p-6 rounded-lg">
            <strong class="text-xl">Pengirim: {{ $DetailPenyakit->Nama }}</strong><br>
            <strong class="text-xl">Dideteksi pada: {{ \Carbon\Carbon::parse($DetailPenyakit->Tanggal_Deteksi)->translatedFormat('d F Y') }}</strong>
            <p class="pt-10 text-lg text-gray-700">{{ $DetailPenyakit->Solusi }}</p>
        </div>
    </div>

    <div class="flex justify-center">
        <a href="{{route ('showHalRiwayatDeteksi')}}" class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600">Kembali</a>
    </div>
</div>
@endsection
