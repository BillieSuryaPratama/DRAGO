@extends("layouts.appPemilik")
@section("content")
<div>
    <h2 class="text-2xl font-bold text-gray-700 mb-4">Selamat Datang, {{ $nama }}!</h2>
    <div class="flex justify-center gap-6 mt-6">
    <div class="bg-green-200 w-64 p-6 rounded-xl shadow text-center">
        <img src="{{ asset('plant (1).png') }}" alt="Tanaman Sehat" class="w-12 h-12 mx-auto mb-2">
        <h2 class="text-xl font-bold text-green-700">Tanaman Sehat</h2>
        <p class="text-3xl font-semibold text-green-900">{{ $jumlahSehat }}</p>
    </div>
    <div class="bg-red-200 w-64 p-6 rounded-xl shadow text-center">
        <img src="{{ asset('plant.png') }}" alt="Tanaman Tidak Sehat" class="w-12 h-12 mx-auto mb-2">
        <h2 class="text-xl font-bold text-red-700">Tanaman Tidak Sehat</h2>
        <p class="text-3xl font-semibold text-red-900">{{ $jumlahSakit }}</p>
    </div>
</div>

</div>
@endsection
