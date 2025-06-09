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

    <h2 class="text-2xl font-bold text-gray-700 pt-6">Berikut adalah jadwal kegiatan para petani hari ini</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 pt-6">
        @foreach($JadwalHariIni as $JadwalHariIniItem)
        @php
            $bgColorClass = '';
            if ($JadwalHariIniItem->Status === 'Terlambat') {
                $bgColorClass = 'bg-red-200';
            } elseif ($JadwalHariIniItem->Status === 'Sudah Dikerjakan') {
                $bgColorClass = 'bg-green-200';
            } else {
                $bgColorClass = 'bg-white';
            }
        @endphp
        <div class="flex flex-col shadow-md {{ $bgColorClass }} rounded-lg p-4">
            <div class="flex flex-col">
                <span class="text-base font-bold text-gray-700 mb-1">{{ $JadwalHariIniItem->Nama }}</span>
                <span class="text-base font-bold text-gray-700 mb-1">
                    {{ \Carbon\Carbon::parse($JadwalHariIniItem->Tanggal)->translatedFormat('d F Y') }}
                </span>
                <span class="text-sm text-black">
                    {{ \Carbon\Carbon::parse($JadwalHariIniItem->JamMulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($JadwalHariIniItem->JamBerakhir)->format('H:i') }}
                </span>
                <span class="text-sm text-black">Kegiatan: {{ $JadwalHariIniItem->Kegiatan }}</span>
                <span class="text-sm text-black">Status: {{ $JadwalHariIniItem->Status }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
