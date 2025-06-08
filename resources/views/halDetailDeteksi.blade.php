@extends("layouts.appPetani")

@section("content")
<main class="p-6">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold mb-4">Detail Deteksi</h2>
        <div class="mb-4">
            <strong>ID Akun:</strong> {{ $deteksi->ID_Akun }}<br>
            <strong>ID Penyakit:</strong> {{ $deteksi->ID_Penyakit }}<br>
            <strong>Akurasi:</strong> {{ $deteksi->Akurasi }}<br>
            <strong>Tanggal Deteksi:</strong> {{ $deteksi->Tanggal_Deteksi }}<br>
        </div>
        <div>
            <strong>Gambar:</strong><br>
            <img src="data:image/jpeg;base64,{{ base64_encode($deteksi->Gambar) }}" alt="Gambar Deteksi" class="max-h-64 mb-4 rounded">
        </div>
    </div>
</main>
@endsection
