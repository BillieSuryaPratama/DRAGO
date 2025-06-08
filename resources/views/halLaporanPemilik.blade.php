@extends("layouts.appPemilik")
@section("content")
<h1 class="text-center text-black font-extrabold text-2xl ">LAPORAN {{ $bulanTahun  ??  ''}}</h1>
<div class="flex justify-start mb-4">
    <form method="GET" action="{{ route('filterLaporan') }}" class="flex gap-2 items-center">
    <input type="hidden" name="periode" id="periodeInput">
    <button type="button" id="bulanTahunBtn" class="bg-blue-500 text-white px-4 py-2 rounded shadow">Filter Bulan & Tahun</button>
    </form>
</div>
<div class="mt-10">
    <h2 class="text-xl font-bold text-center mb-4">Grafik Jumlah Total Tanaman Sehat & Sakit</h2>
    <canvas id="totalLaporanChart" height="100"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('totalLaporanChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tanaman Sehat', 'Tanaman Sakit'],
            datasets: [{
                label: 'Jumlah Tanaman',
                data: [{{ $totalSehat }}, {{ $totalSakit }}],
                backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(255, 99, 132, 0.7)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah'
                    }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @if($laporan->isEmpty())
    <div class="col-span-full text-center text-gray-500 font-medium">
        Tidak ada laporan yang sesuai dengan filter bulan dan tahun.
    </div>
    @else
    @foreach ($laporan as $item)
    <div class="bg-gray-100 p-4 rounded-xl shadow">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->Akun->Nama ?? 'Nama Tidak Ditemukan' }}</h2>
        <div class="text-sm text-gray-700">
            <p><span class="font-medium">Tanaman Sehat:</span> {{ $item->Jumlah_Tumbuhan_Sehat }}</p>
            <p><span class="font-medium">Tanaman Sakit:</span> {{ $item->Jumlah_Tumbuhan_Sakit }}</p>
            <p><span class="font-medium">Keterangan:</span> {{ $item->Keterangan }}</p>
            <p><span class="font-medium">Tanggal:</span> {{ \Carbon\Carbon::parse($item->Tanggal_Laporan)->translatedFormat('d F Y') }}</p>
        </div>
    </div>
    @endforeach
    @endif
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

