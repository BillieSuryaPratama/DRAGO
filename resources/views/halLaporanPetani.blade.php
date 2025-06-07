@extends('layouts.appPetani')
@section('content')
@if (session('success'))
    <div  id="successMessage" class="bg-green-500 text-white p-4 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000);
    </script>
@endif
@foreach ($laporan as $laporan)
    <div>
        <a href="{{ route('showHalDetailLaporan', $laporan->ID_Laporan) }}" class=" p-4 rounded-xl" >
        <p><span class="font-medium">Tanaman Sehat:</span> {{ $laporan->Jumlah_Tumbuhan_Sehat }}</p>
        <p><span class="font-medium">Tanaman Sakit:</span> {{ $laporan->Jumlah_Tumbuhan_Sakit }}</p>
        <p><span class="font-medium">Keterangan:</span> {{ $laporan->Keterangan }}</p>
        <p><span class="font-medium">Tanggal:</span>{{ \Carbon\Carbon::parse($laporan->Tanggal_Laporan)->locale('id')->isoFormat('DD MMMM YYYY') }}</p>
    </a>
    </div>
@endforeach
<div style="background-color: #eee; border-radius: 10px; padding: 20px; text-align: center; color: #888; cursor: pointer;">
    <a href="{{ route('showHalTambahLaporan') }}" style="text-decoration: none; color: #888;">
        <strong>TAMBAH LAPORAN +</strong>
    </a>
</div>
@endsection
