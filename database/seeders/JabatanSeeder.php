<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
          [
            'Nama_Jabatan' => 'Admin',
          ],
          [
            'Nama_Jabatan' => 'Petani',
          ]
        ];

        foreach ($data as $item) {
            Jabatan::create([
                'Nama_Jabatan' => $item['Nama_Jabatan'],
            ]);
        }
    }
}
