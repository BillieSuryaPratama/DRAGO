<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeteksiPenyakit extends Model
{
    use HasFactory;
    protected $table = 'deteksi_penyakit';
    protected $primaryKey = 'ID_Deteksi';
    public $timestamps = true;
    protected $fillable = [
        'ID_Akun',
        'ID_Penyakit',
        'Gambar_Deteksi',
        'Akurasi',
        'Tanggal_Deteksi'
    ];

    public function Penyakit(){
        return $this->belongsTo(Penyakit::class, 'ID_Penyakit');
    }

    public function Akun(){
        return $this->belongsTo(Akun::class, 'ID_Akun');
    }
}
