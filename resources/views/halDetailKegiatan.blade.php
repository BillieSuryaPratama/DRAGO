@extends("layouts.appPemilik")

@section("content")
@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
@endif

<div class="container flex justify-center">
    <div class="w-full max-w-4xl">
        <div class="mb-6">
            @if ($kegiatan->isEmpty())
                <h2 class="text-2xl font-bold">Tidak ada kegiatan yang tersedia.</h2>
            @else
                <h2 class="text-2xl font-bold">{{ $kegiatan[0]->Nama }}</h2>
                <p class="text-lg font-semibold text-gray-700">Jadwal Kegiatan</p>
            @endif
        </div>

        @foreach($kegiatan as $kegiatanItem)
        <div class="flex items-stretch mb-4">
            @php
                $nonClickable = in_array($kegiatanItem->Status, ['Sudah Dikerjakan', 'Terlambat']);
            @endphp

            @if ($nonClickable)
                <div class="flex-1 shadow-md bg-gray-100 cursor-not-allowed rounded-lg p-4 mr-4 flex flex-col justify-center opacity-70">
            @else
                <a href="{{ route('showHalUbahKegiatan', $kegiatanItem->ID_Penjadwalan) }}" class="flex-1 shadow-md bg-white hover:bg-gray-300 transition rounded-lg p-4 mr-4 flex flex-col justify-center">
            @endif
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
            @if ($nonClickable)
                </div>
            @else
                </a>
            @endif

            <form action="{{ route('hapusKegiatan', $kegiatanItem->ID_Penjadwalan) }}" method="POST" class="deleteForm flex items-stretch" data-id="{{ $kegiatanItem->ID_Penjadwalan }}">
                @csrf
                @method('DELETE')
                <button type="button" class="deleteButton bg-red-700 hover:bg-red-800 text-white px-4 rounded w-full h-full">
                    Hapus Jadwal
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>

<div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative bg-white rounded-lg shadow-lg p-6 max-w-sm w-full z-50">
        <h2 class="text-lg font-bold mb-4">Konfirmasi Penghapusan Jadwal</h2>
        <p>Anda yakin ingin menghapus jadwal ini?</p>
        <div class="flex justify-end mt-4">
            <button id="cancelDelete" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Tidak</button>
            <button id="confirmDelete" class="bg-red-600 text-white px-4 py-2 rounded">Ya</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('deleteModal');
        const cancelBtn = document.getElementById('cancelDelete');
        const confirmBtn = document.getElementById('confirmDelete');
        let selectedForm = null;
        const deleteButtons = document.querySelectorAll('.deleteButton');

        deleteButtons.forEach((btn) => {
            btn.addEventListener('click', () => {
                selectedForm = btn.closest('.deleteForm');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            selectedForm = null;
        });

        confirmBtn.addEventListener('click', () => {
            if (selectedForm) {
                selectedForm.submit();
            }
        });
    });
</script>
@endsection
