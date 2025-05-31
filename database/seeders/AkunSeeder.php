<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
          [
            'ID_Jabatan' => 1,
            'Nama' => 'Ahmad Saputra',
            'Alamat' => 'Jl. Karang No. 10',
            'Nomor_HP' => '081234567890',
            'Username' => 'admin',
            'Email' => 'ahmad.saputra@gmail.com',
            'Sandi' => 'admin123',
            'Status_Akun' => TRUE
          ],
          [
            'ID_Jabatan' => 2,
            'Nama' => 'Gayuh Maulana',
            'Alamat' => 'Jl. Melati No. 5',
            'Nomor_HP' => '082345678901',
            'Username' => 'petani',
            'Email' => 'Gayuh_maulanaaa@gmail.com',
            'Sandi' => 'petani123',
            'Status_Akun' => TRUE
          ],
          [
            'ID_Jabatan' => 2,
            'Nama' => 'Kholili',
            'Alamat' => 'Jl. Mawar No. 15',
            'Nomor_HP' => '083456789012',
            'Username' => 'kholili',
            'Email' => 'kholili178526@yahoo.com',
            'Sandi' => 'kholili123',
            'Status_Akun' => TRUE
          ],
          [
            'ID_Jabatan' => 2,
            'Nama' => 'Deni Riswiyono',
            'Alamat' => 'Jl. Anggrek No. 20',
            'Nomor_HP' => '084567890123',
            'Username' => 'deni',
            'Email' => 'sii_riswiyono@gmail.com',
            'Sandi' => 'deni123',
            'Status_Akun' => TRUE
          ]
        ];

        foreach ($data as $item) {
            Akun::create([
                'ID_Jabatan' => $item['ID_Jabatan'],
                'Nama' => $item['Nama'],
                'Alamat' => $item['Alamat'],
                'Nomor_HP' => $item['Nomor_HP'],
                'Username' => $item['Username'],
                'Email' => $item['Email'],
                'Sandi' => $item['Sandi'],
                'Status_Akun' => $item['Status_Akun']
            ]);
        }
    }
}
