@extends("layouts.appPetani")

@section("content")
<div class="container mx-auto px-6 pt-6 pb-20 flex justify-center">
  <div class="w-full max-w-[1200px] space-y-8">
    @foreach($DeteksiPenyakit as $Deteksi)
    <a href="{{ route('showHalDetailDeteksi', $Deteksi->ID_Deteksi) }}" class="block no-underline">
      <div class="flex items-center bg-white rounded-xl shadow-md p-6 cursor-pointer transition-transform transform hover:bg-gray-200">
        <div class="flex-shrink-0 w-[150px] h-[150px] rounded-lg overflow-hidden">
          <img src="data:image/jpeg;base64,{{ base64_encode($Deteksi->Gambar_Deteksi) }}" alt="Gambar Deteksi {{ $Deteksi->Nama_Penyakit }}" class="w-full h-full object-cover object-center"/>
        </div>
        <div class="flex-grow ml-6">
          <h2 class="text-3xl font-extrabold text-gray-900 mb-1">{{ $Deteksi->Nama }}</h2>
          <time class="block text-gray-500 mb-3">{{ \Carbon\Carbon::parse($Deteksi->Tanggal_Deteksi)->translatedFormat('d F Y') }}</time>
          <div style="margin-top: 10px; color: #333;">{!! nl2br(e(Str::limit($Deteksi->Solusi, 200))) !!}</div>
        </div>
      </div>
    </a>
    @endforeach
  </div>
</div>
@endsection
