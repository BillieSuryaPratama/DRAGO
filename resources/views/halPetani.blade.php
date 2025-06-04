@extends("layouts.appPemilik")

@section("content")
<div class="container flex justify-center">
    <div class="w-full max-w-4xl">
        @foreach($Petani as $petani)
        <div style="background-color:#ddd; border-radius: 10px; padding: 10px; margin-top:30px; margin-bottom: 15px; display: flex; align-items: center; ">
            <img src="{{ asset('user.png') }}" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 15px;">
            <div style="flex-grow: 1;">
                <strong>{{ $petani->Nama }}</strong>
            </div>

            <a href="">
                <button style="background-color: #4a90e2; color: white; border: none; padding: 5px 15px; border-radius: 5px;">
                    LIHAT
                </button>
            </a>
        </div>
        @endforeach

        <div style="background-color: #eee; border-radius: 10px; padding: 20px; text-align: center; color: #888; cursor: pointer;">
            <a href="{{ route('showHalTambahAkunPetani') }}" style="text-decoration: none; color: #888;">
                <strong>TAMBAHKAN AKUN PETANI +</strong>
            </a>
        </div>
    </div>
</div>
@endsection
