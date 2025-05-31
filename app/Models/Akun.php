<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $table = 'akun';
    protected $primaryKey = 'ID_Akun';
    public $timestamps = true;
    protected $fillable = [
        'ID_Jabatan',
        'Nama',
        'Alamat',
        'Nomor_HP',
        'Username',
        'Email',
        'Sandi',
        'Status_Akun'
    ];

    public function Jabatan(){
        return $this->belongsTo(Jabatan::class, 'ID_Jabatan');
    }

    public function DeteksiPenyakit(){
        return $this->hasMany(DeteksiPenyakit::class, 'ID_Akun');
    }

    public function Laporan(){
        return $this->hasMany(Laporan::class, 'ID_Akun');
    }

    public function Penjadwalan(){
        return $this->hasMany(Penjadwalan::class, 'ID_Akun');
    }
}
