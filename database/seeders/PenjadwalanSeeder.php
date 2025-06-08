<?php

namespace Database\Seeders;

use App\Models\Penjadwalan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PenjadwalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $data=[
          [
            'ID_Akun' => 2,
            'JamMulai' => $now->copy()->addHours(1), // 1 jam dari sekarang
            'JamBerakhir' => $now->copy()->addHours(2), // 2 jam dari sekarang
            'Kegiatan' => 'Pemeriksaan Tanaman',
            'Status' => 'Belum Dikerjakan',
            'Tanggal' => $now->toDateString(),
          ],
          [
            'ID_Akun' => 3,
            'JamMulai' => $now->copy()->subHours(1), // 1 jam yang lalu
            'JamBerakhir' => $now->copy()->addHours(1), // 1 jam dari sekarang
            'Kegiatan' => 'Penyiraman Tanaman',
            'Status' => 'Belum Dikerjakan',
            'Tanggal' => $now->toDateString(),
          ],
          [
            'ID_Akun' => 3,
            'JamMulai' => $now->copy()->subHours(3), // 3 jam yang lalu
            'JamBerakhir' => $now->copy()->subHours(1), // 1 jam yang lalu
            'Kegiatan' => 'Pemupukan',
            'Status' => 'Sudah Dikerjakan',
            'Tanggal' => $now->toDateString(),
          ],
          [
            'ID_Akun' => 4,
            'JamMulai' => $now->copy()->subHours(5), // 5 jam yang lalu
            'JamBerakhir' => $now->copy()->subHours(3), // 3 jam yang lalu
            'Kegiatan' => 'Pemeriksaan Hama',
            'Status' => 'Terlambat',
            'Tanggal' => $now->toDateString(),
          ]
        ];

        foreach ($data as $item) {
            Penjadwalan::create([
                'ID_Akun' => $item['ID_Akun'],
                'JamMulai' => $item['JamMulai'],
                'JamBerakhir' => $item['JamBerakhir'],
                'Kegiatan' => $item['Kegiatan'],
                'Status' => $item['Status'],
                'Tanggal' => $item['Tanggal'],
            ]);
        }
    }
}
