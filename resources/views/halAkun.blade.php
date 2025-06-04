@if(session('id_jabatan') == 1)
    @extends("layouts.appPemilik")
@elseif(session('id_jabatan') == 2)
    @extends("layouts.appPetani")
@endif

@section("content")
@endsection
