<?php

// App\Models\Akun.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun'; // pastikan ini sesuai nama tabel
    protected $primaryKey = 'ID_Akun'; // Ganti dengan nama primary key sebenarnya
    public $timestamps = false;

    protected $fillable = [
        'Nama', 'Alamat', 'Nomor_HP', 'Username', 'Email', 'Sandi'
    ];
}

