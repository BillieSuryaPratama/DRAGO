@extends("layouts.appPetani")

@section("content")
<div>
    <h2 class="text-2xl font-bold text-gray-700 mb-4">Selamat Datang, {{ $nama }}!</h2>
    <p class="text-gray-600">Silakan pilih menu di atas untuk mengelola sistem deteksi penyakit batang buah naga.</p>

    <h2 class="text-2xl font-bold text-gray-700 pt-6">Berikut adalah jadwal kegiatan hari ini</h2>
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
