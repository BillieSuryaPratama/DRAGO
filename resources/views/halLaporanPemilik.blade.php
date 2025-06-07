@extends("layouts.appPemilik")
@section("content")
<div class="flex justify-start mb-4">
    <form method="GET" class="flex gap-2 items-center">
    <input type="hidden" name="periode" id="periodeInput">
    <button type="button" id="bulanTahunBtn" class="bg-blue-500 text-white px-4 py-2 rounded shadow">Filter Bulan & Tahun</button>
    </form>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($laporan as $laporan)
    <div class="bg-gray-100 p-4 rounded-xl shadow">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $laporan->Akun->Nama ?? 'Nama Tidak Ditemukan' }}</h2>
        <div class="text-sm text-gray-700">
        <p><span class="font-medium">Tanaman Sehat:</span> {{ $laporan->Jumlah_Tumbuhan_Sakit }}</p>
        <p><span class="font-medium">Tanaman Sakit:</span> {{ $laporan->Jumlah_Tumbuhan_Sehat }}</p>
        <p><span class="font-medium">Keterangan:</span> {{ $laporan->Keterangan }}</p>
        <p><span class="font-medium">Tanggal:</span> {{ \Carbon\Carbon::parse($laporan->Tanggal_Laporan)->translatedFormat('d F Y') }}</p>
        </div>
    </div>
    @endforeach
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
<script>
    const periodeInput = document.getElementById('periodeInput');
    const btn = document.getElementById('bulanTahunBtn');
    btn.addEventListener('click', () => {
        flatpickr(periodeInput, {
        plugins: [new monthSelectPlugin({
        shorthand: true,
        dateFormat: "Y-m",
        theme: "light"
    })],
    onChange: function(selectedDates, dateStr) {
        periodeInput.value = dateStr;
        btn.closest('form').submit();
    }}).open();
    });
</script>
@endsection

