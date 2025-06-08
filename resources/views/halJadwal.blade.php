@extends("layouts.appPemilik")

@section("content")
@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded mb-4 text-center">
        {{ $errors->first() }}
    </div>
@endif

<div class="container flex justify-center">
    <div class="w-full max-w-4xl">
        <div class="mb-6">
            <p class="text-lg font-semibold text-gray-700">Jadwal Kegiatan</p>
        </div>

        @foreach($kegiatan as $kegiatanItem)
        <div class="flex items-stretch mb-4">
            <div class="flex-1 shadow-md bg-gray-100 rounded-lg p-4 mr-4 flex flex-col justify-center">
                <div class="flex flex-col">
                    <span class="text-base font-bold text-gray-700 mb-1">
                        {{ \Carbon\Carbon::parse($kegiatanItem->Tanggal)->translatedFormat('d F Y') }}
                    </span>
                    <span class="text-sm text-black">
                        {{ \Carbon\Carbon::parse($kegiatanItem->JamMulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($kegiatanItem->JamBerakhir)->format('H:i') }}
                    </span>
                    <span class="text-sm text-black">Kegiatan: {{ $kegiatanItem->Kegiatan }}</span>
                    <span class="text-sm text-black">Status: {{ $kegiatanItem->Status }}</span>
                </div>
            </div>

            <form action="{{ route('cekValidasiWaktu') }}" method="POST" class="flex items-stretch">
                @csrf
                <input type="hidden" name="id" value="{{ $kegiatanItem->ID_Penjadwalan }}">
                <button type="submit" class="px-4 rounded w-[150px] h-[100%] flex items-center justify-center text-center
                    {{ $kegiatanItem->Status == 'Belum Dikerjakan' ? 'bg-gray-400' : ($kegiatanItem->Status == 'Sudah Dikerjakan' ? 'bg-green-500' : 'bg-red-500') }}
                    {{ $kegiatanItem->Status == 'Belum Dikerjakan' ? '' : 'cursor-not-allowed' }}"
                    {{ $kegiatanItem->Status != 'Belum Dikerjakan' ? 'disabled' : '' }}>
                    {{ $kegiatanItem->Status }}
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
