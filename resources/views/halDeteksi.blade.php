@extends("layouts.appPetani")

@section("content")
<div id="message" class="bg-green-500 text-white p-4 rounded mb-4 text-center hidden">Gambar berhasil ditambahkan</div>

<div class="bg-white shadow-md rounded-lg p-8 max-w-4xl mx-auto">
    <main class="flex flex-col items-center justify-center p-5">
        <h2 class="text-4xl font-extrabold mb-4 text-black">Unggah Foto!</h2>
        <h1 class="font-extrabold mb-4 text-black text-center">Untuk Mengetahui Penyakit Batang Pada Buah Naga kamu.</h1>

        <div class="w-fit max-w-md text-center">
            <form action="{{ route('Deteksi')}}" method="POST" enctype="multipart/form-data" id="uploadForm">
                @csrf
                <label for="imageInput" id="uploadLabel" class="cursor-pointer border-2 border-dashed border-gray-300 rounded-lg px-6 py-12 bg-gray-50 hover:bg-gray-100 flex flex-col items-center justify-center">
                    <img id="previewImage" src="" alt="Preview" class="hidden max-h-64 mb-4 rounded">
                    <div id="uploadIcon" class="text-4xl text-gray-400 font-light mb-2">+</div>
                    <p id="uploadText" class="text-gray-500">Unggah Foto</p>
                </label>
                <input id="imageInput" type="file" name="imagefile" accept="image/*" class="hidden" required>

                <div class="flex justify-center space-x-4 mt-6">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-20 py-2 rounded-lg font-semibold transition text-center">Mulai Deteksi</button>
                </div>
                <div class="flex justify-center space-x-4">
                    <button type="button" id="ButtonBatal" class="bg-red-500 hover:bg-red-600 text-white w-[256px] py-2 mt-6 rounded-lg font-semibold transition text-center hidden">Batal</button>
                </div>
            </form>
        </div>

        <div class="flex gap-4 mt-5 ">
            <a id="ButtonRiwayat" href="{{ route('showHalRiwayatDeteksi') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-20 py-2 rounded-lg font-semibold transition text-center">Lihat Riwayat</a>
        </div>
    </main>
</div>

<script>
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');
    const uploadIcon = document.getElementById('uploadIcon');
    const uploadText = document.getElementById('uploadText');
    const ButtonBatal = document.getElementById('ButtonBatal');
    const ButtonRiwayat = document.getElementById('ButtonRiwayat');
    const message = document.getElementById('message');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                uploadIcon.classList.add('hidden');
                uploadText.textContent = "Klik untuk ganti foto";

                ButtonBatal.classList.remove('hidden');
                ButtonRiwayat.classList.add('hidden');
                message.classList.remove('hidden');
            }

            reader.readAsDataURL(file);
        }
    });

    ButtonBatal.addEventListener('click', function() {
        imageInput.value = '';
        previewImage.classList.add('hidden');
        uploadIcon.classList.remove('hidden');
        uploadText.textContent = "Unggah Foto";

        ButtonBatal.classList.add('hidden');
        ButtonRiwayat.classList.remove('hidden')
        message.classList.add('hidden');
    });
</script>
@endsection
