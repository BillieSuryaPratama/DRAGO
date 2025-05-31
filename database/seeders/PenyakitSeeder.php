<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
          [
            'Nama_Penyakit' => 'Antraknosa',
            'Solusi' => 'Pangkas bagian yang terinfeksi untuk mencegah penyebaran penyakit. Semprotkan fungisida berbahan aktif seperti mankozeb secara teratur, terutama setelah hujan. Pastikan untuk menghindari kelembaban berlebih di sekitar tanaman dengan meningkatkan sirkulasi udara dan mengatur jarak tanam yang cukup. Lakukan pemantauan rutin untuk mendeteksi gejala awal dan segera ambil tindakan jika diperlukan.'
          ],
          [
            'Nama_Penyakit' => 'Bercak Coklat',
            'Solusi' => 'Gunakan fungisida sistemik yang direkomendasikan dan tingkatkan ventilasi pada area tanaman untuk mengurangi kelembapan. Pastikan untuk memangkas daun yang terinfeksi dan membuangnya jauh dari area tanam. Selain itu, lakukan rotasi tanaman untuk mengurangi risiko infeksi di masa mendatang dan pertimbangkan penggunaan varietas tanaman yang lebih tahan terhadap penyakit ini.'
          ],
          [
            'Nama_Penyakit' => 'Hawar',
            'Solusi' => 'Semprotkan fungisida berbahan aktif boskalid atau fluopyram pada gejala awal. Hindari penyiraman berlebihan yang dapat meningkatkan kelembapan di sekitar tanaman. Pastikan untuk menjaga kebersihan area tanam dengan menghilangkan sisa-sisa tanaman yang terinfeksi dan melakukan rotasi tanaman untuk mengurangi risiko infeksi di masa depan. Pemantauan rutin sangat penting untuk mendeteksi gejala lebih awal.'
          ],
          [
            'Nama_Penyakit' => 'Sehat',
            'Solusi' => 'Tidak ada penanganan khusus yang diperlukan. Lanjutkan perawatan dan pemantauan rutin untuk memastikan tanaman tetap sehat. Pastikan untuk memberikan nutrisi yang cukup dan menjaga kelembapan tanah yang optimal. Lakukan pemangkasan jika diperlukan untuk meningkatkan sirkulasi udara dan mencegah masalah di masa mendatang.'
          ],
          [
            'Nama_Penyakit' => 'Busuk Batang',
            'Solusi' => 'Cabut dan musnahkan tanaman yang membusuk untuk mencegah penyebaran penyakit. Sterilisasi tanah dengan menggunakan bahan kimia yang sesuai atau dengan metode fisik seperti pemanasan. Semprotkan bakterisida atau fungisida untuk mengendalikan patogen yang ada di tanah. Pastikan untuk menjaga kelembapan tanah yang seimbang dan hindari penyiraman berlebihan. Lakukan pemantauan rutin untuk mendeteksi gejala awal.'
          ],
          [
            'Nama_Penyakit' => 'Kanker Batang',
            'Solusi' => 'Pangkas area yang terkena kanker dengan hati-hati untuk mencegah penyebaran lebih lanjut. Semprotkan fungisida yang sesuai dan pastikan untuk menghindari luka mekanis pada batang yang dapat memicu infeksi. Jaga kebersihan area tanam dan pertimbangkan untuk menggunakan varietas yang lebih tahan terhadap penyakit ini. Lakukan pemantauan rutin untuk mendeteksi gejala lebih awal dan ambil tindakan segera jika diperlukan.'
          ]
        ];

        foreach ($data as $item) {
            Penyakit::create([
                'Nama_Penyakit' => $item['Nama_Penyakit'],
                'Solusi' => $item['Solusi'],
            ]);
        }
    }
}
