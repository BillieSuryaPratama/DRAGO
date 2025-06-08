@extends('layouts.appPetani')
@section('content')
@if (session('success'))
    <div id="successMessage" class="bg-green-500 text-white w-1/4 p-2 rounded-xl mx-auto text-center opacity-100 transition-opacity duration-700">
        {{ session('success') }}
    </div>
    <script>
        const msg = document.getElementById('successMessage');
        if (msg && msg.textContent.trim() !== '') {
            setTimeout(() => {
                msg.classList.remove('opacity-100');
                msg.classList.add('opacity-0');
                setTimeout(() => {
                    msg.style.display = 'none';
                }, 300);
            }, 2000);}
    </script>
@endif
<div class="max-w-6xl mx-auto px-4 mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($laporan as $laporan)
            <div class="bg-gray-100 p-4 rounded-xl shadow">
                <a href="{{ route('showHalDetailLaporan', $laporan->ID_Laporan) }}" class="block hover:bg-gray-200 transition rounded-lg p-2">
                    <p><span class="font-medium">Tanaman Sehat:</span> {{ $laporan->Jumlah_Tumbuhan_Sehat }}</p>
                    <p><span class="font-medium">Tanaman Sakit:</span> {{ $laporan->Jumlah_Tumbuhan_Sakit }}</p>
                    <p><span class="font-medium">Keterangan:</span> {{ $laporan->Keterangan }}</p>
                    <p><span class="font-medium">Tanggal:</span> {{ \Carbon\Carbon::parse($laporan->Tanggal_Laporan)->locale('id')->isoFormat('DD MMMM YYYY') }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
<div class="flex w-1/2 bg-gray-300 mx-auto p-5 rounded-xl justify-center items-center mt-10">
    <a href="{{ route('showHalTambahLaporan') }}" class='text-gray-500 font-bold'>
        <strong>TAMBAH LAPORAN +</strong>
    </a>
</div>
@endsection
