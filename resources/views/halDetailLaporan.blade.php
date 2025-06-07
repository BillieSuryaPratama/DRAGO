@extends('layouts.appPetani')
@section('content')
<div class='flex justify-center gap-6'>
<main class="bg-green-100 shadow-md w-1/2 rounded-lg p-10">
    <form action="{{ route('SimpanPerubahanLaporan') }}" method="POST" class="max-w-5xl mx-auto mt-6">
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
                    <input type="number" name="Jumlah_Tumbuhan_Sakit" value="{{old('Jumlah_Tumbuhan_Sakit',$laporan->Jumlah_Tumbuhan_Sakit)}}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    <label class="block font-semibold text-gray-700 mt-4">Jumlah Tumbuhan Sehat</label>
                    <input type="number" name="Jumlah_Tumbuhan_Sehat" value="{{old('Jumlah_Tumbuhan_Sehat',$laporan->Jumlah_Tumbuhan_Sehat)}}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    <label class="block font-semibold text-gray-700 mt-4">Keterangan</label>
                    <input type="text" name="Keterangan" value="{{old('Keterangan', $laporan->Keterangan)}}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                    <label for="tanggal" class="block font-semibold text-gray-700 mt-4">Tanggal</label>
                    <input type="date" name="Tanggal_Laporan" value="{{old('Tanggal_Laporan', \Carbon\Carbon::parse($laporan->Tanggal_Laporan)->format('Y-m-d')) }}" class="border rounded p-2 w-full">
                    <input type="hidden" name="ID_Laporan" value="{{ old('ID_Laporan', $laporan->ID_Laporan )}}">
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
<div class="">
    <form id="deleteForm" action="{{ route('HapusLaporan', $laporan->ID_Laporan) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" id="deleteButton" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-1 rounded">
            Hapus Laporan
        </button>
    </form>
    </div>
</div>
<div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative bg-white rounded-lg shadow-lg p-6 max-w-sm w-full z-50">
            {{-- <h2 class="text-lg font-bold mb-4">Konfirmasi Penghapusan Akun</h2> --}}
            <p>Anda yakin ingin menghapus laporan ini?</p>
            <div class="flex justify-end mt-4">
                <button id="cancelDelete" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Batal</button>
                <button id="confirmDelete" class="bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const logoutBtn = document.getElementById('deleteButton');
        const modal = document.getElementById('deleteModal');
        const cancelBtn = document.getElementById('cancelDelete');
        const confirmBtn = document.getElementById('confirmDelete');
        const deleteForm = document.getElementById('deleteForm');

        logoutBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            window.location.href = "{{ route('showHalPetani') }}";
        });

        confirmBtn.addEventListener('click', () => {
            deleteForm.submit();
        });
    });
</script>
@endsection
