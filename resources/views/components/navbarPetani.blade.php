<nav class="flex items-center justify-between bg-drago text-white p-4">
    <div class="flex items-center gap-2">
        <img src="{{ asset('buahnaga.png') }}" alt="Buah Naga" class="w-11 h-11">
        <h1 class="text-2xl font-bold tracking-normal" style="color: #FFD9A8">DRAGO</h1>
    </div>

    <ul class="flex gap-6 text-lg font-semibold">
        <li><a href="{{ route('DashboardPetani') }}" class="{{ request()->routeIs('DashboardPetani') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Home</a></li>
        <li><a href="{{ route('showHalDeteksi') }}" class="{{ request()->routeIs('showHalDeteksi') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Deteksi</a></li>
        <li><a href="" class="{{ request()->routeIs('halJadwal') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Jadwal</a></li>
        <li><a href="{{ route('showHalLaporanPetani') }}" class="{{ request()->routeIs('showHalLaporanPetani') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Laporan</a></li>
        <li><a href="{{ route('showHalAkunPetani') }}" class="{{ request()->routeIs(['showHalAkunPetani', 'showHalFormUbahData']) ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Akun</a></li>
    </ul>
</nav>
