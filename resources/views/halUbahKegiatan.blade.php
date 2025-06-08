@extends("layouts.appPemilik")

@section("content")
<main class="p-6 bg-white rounded-b-xl">
    <form action="{{ route('SimpanPerubahanKegiatan', $kegiatan->ID_Penjadwalan) }}" method="POST" class="max-w-5xl mx-auto mt-6">
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

        <div class="bg-white shadow-md rounded-lg p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700">Nama</label>
                    <select name="ID_Akun" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                        <option value="">Pilih Petani</option>
                        @foreach ($petani as $p)
                            <option value="{{ $p->ID_Akun }}"
                                {{ old('ID_Akun', $kegiatan->ID_Akun) == $p->ID_Akun ? 'selected' : '' }}>
                                {{ $p->Nama }}
                            </option>
                        @endforeach
                    </select>

                    <label class="block font-semibold text-gray-700 mt-4">Jam Mulai</label>
                    <input type="datetime-local" name="JamMulai" value="{{ old('JamMulai', $kegiatan->JamMulai) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                    <label class="block font-semibold text-gray-700 mt-4">Jam Berakhir</label>
                    <input type="datetime-local" name="JamBerakhir" value="{{ old('JamBerakhir', $kegiatan->JamBerakhir) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700">Tanggal</label>
                    <input type="date" name="Tanggal" value="{{ old('Tanggal', $kegiatan->Tanggal) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">

                    <label class="block font-semibold text-gray-700 mt-4">Kegiatan</label>
                    <input type="text" name="Kegiatan" value="{{ old('Kegiatan', $kegiatan->Kegiatan) }}" class="w-full border border-pink-600 rounded px-3 py-2 mt-1">
                </div>
            </div>
            <div class="mt-6">
                <p><strong>Preview Tanggal:</strong> <span id="previewTanggal">-</span></p>
                <p><strong>Jam Mulai (24 jam):</strong> <span id="previewJamMulai">-</span></p>
                <p><strong>Jam Berakhir (24 jam):</strong> <span id="previewJamBerakhir">-</span></p>
            </div>

            <div class="flex justify-between mt-8">
                <div>
                    <a href="{{ route('showHalDetailKegiatan', $kegiatan->ID_Akun) }}" class="bg-red-500 hover:bg-red-600 text-white font-medium px-5 py-2 rounded">Batal</a>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-5 py-2 rounded">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    function updatePreviewTanggal() {
        const tanggalInput = document.querySelector('input[name="Tanggal"]');
        const date = new Date(tanggalInput.value);
        if (!isNaN(date)) {
            const hari = date.getDate();
            const bulan = date.getMonth(); // 0 = Januari, 11 = Desember
            const tahun = date.getFullYear();

            const namaBulan = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            const formatted = `${hari} ${namaBulan[bulan]} ${tahun}`;
            document.getElementById('previewTanggal').textContent = formatted;
        } else {
            document.getElementById('previewTanggal').textContent = '-';
        }
    }

    function updatePreviewJam(selectorInput, selectorPreview) {
        const input = document.querySelector(`input[name="${selectorInput}"]`);
        const date = new Date(input.value);
        if (!isNaN(date)) {
            const formattedTime = date.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            });
            document.getElementById(selectorPreview).textContent = formattedTime;
        } else {
            document.getElementById(selectorPreview).textContent = '-';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const tanggalInput = document.querySelector('input[name="Tanggal"]');
        const jamMulaiInput = document.querySelector('input[name="JamMulai"]');
        const jamBerakhirInput = document.querySelector('input[name="JamBerakhir"]');

        tanggalInput.addEventListener('input', updatePreviewTanggal);
        jamMulaiInput.addEventListener('input', () => updatePreviewJam("JamMulai", "previewJamMulai"));
        jamBerakhirInput.addEventListener('input', () => updatePreviewJam("JamBerakhir", "previewJamBerakhir"));

        updatePreviewTanggal();
        updatePreviewJam("JamMulai", "previewJamMulai");
        updatePreviewJam("JamBerakhir", "previewJamBerakhir");
    });
</script>
@endsection
