<nav class="flex items-center justify-between bg-drago text-white p-4">
    <div class="flex items-center gap-2">
        <img src="{{ asset('buahnaga.png') }}" alt="Buah Naga" class="w-11 h-11">
        <h1 class="text-2xl font-bold tracking-normal" style="color: #FFD9A8">DRAGO</h1>
    </div>

    <ul class="flex gap-6 text-lg font-semibold">
        <li><a href="{{ route('DashboardPemilik') }}" class="{{ request()->routeIs('DashboardPemilik') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Home</a></li>
        <li><a href="{{ route('showHalPenjadwalan') }}" class="{{ request()->routeIs(['showHalPenjadwalan', 'showHalTambahJadwalKegiatan', 'showHalDetailKegiatan']) ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Penjadwalan</a></li>
        <li><a href="{{ route('showHalLaporanPemilik')}}" class="{{ request()->routeIs('showHalLaporanPemilik') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Laporan</a></li>
        <li><a href="{{ route('showHalPetani') }}" class="{{ request()->routeIs(['showHalPetani', 'showHalTambahAkunPetani', 'showHalDetailPetani']) ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Petani</a></li>
        <li><a href="{{ route('showHalAkunPemilik') }}" class="{{ request()->routeIs(['showHalAkunPemilik', 'showHalFormUbahData']) ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Akun</a></li>
    </ul>
</nav>
