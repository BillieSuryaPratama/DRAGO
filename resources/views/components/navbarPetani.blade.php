<nav class="flex items-center justify-between bg-drago text-white p-4">
    <div class="flex items-center gap-2">
        <img src="{{ asset('buahnaga.png') }}" alt="Buah Naga" class="w-11 h-11">
        <h1 class="text-2xl font-bold tracking-normal" style="color: #FFD9A8">DRAGO</h1>
    </div>

    {{-- <div class="flex gap-6 text-lg font-semibold">
        <a href="{{ route('berandapetani', ['id' => $petani->ID_Akun]) }}"
            class="nav-link hover:underline {{ request()->is('berandapetani') ? 'text-green-800' : 'text-white' }}">
            Home
        </a>
        <a href="{{ route('tambahgambar', ['id' => $petani->ID_Akun]) }}"
            class="nav-link hover:underline {{ request()->is('tambahgambar') ? 'text-green-800' : 'text-white' }}">
            Deteksi
        </a>
        <a href="" class="nav-link hover:underline ">
            Jadwal
        </a>
        <a href="" class="nav-link hover:underline">
            Laporan
        </a>
        <a href="{{ route('akunpetani', ['id' => $petani->ID_Akun]) }}" class="nav-link hover:underline {{ request()->is('akunpetani') ? 'text-green-800' : 'text-white' }}">
            Akun
        </a>
    </div> --}}

    <ul class="flex gap-6 text-lg font-semibold">
        <li><a href="" class="{{ request()->routeIs('DashboardPetani') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Home</a></li>
        <li><a href="" class="{{ request()->routeIs('halDeteksi') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Deteksi</a></li>
        <li><a href="" class="{{ request()->routeIs('halJadwal') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Jadwal</a></li>
        <li><a href="" class="{{ request()->routeIs('halLaporanPetani') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Laporan</a></li>
        <li><a href="" class="{{ request()->routeIs('halAkun') ? 'text-[#0cbd66]' : 'hover:text-[#0cbd66]' }}">Akun</a></li>
    </ul>
</nav>
