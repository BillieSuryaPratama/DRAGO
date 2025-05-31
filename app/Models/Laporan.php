<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $primaryKey = 'ID_Laporan';
    public $timestamps = true;
    protected $fillable = [
        'ID_Akun',
        'Tanggal_Laporan',
        'Jumlah_Tumbuhan_Sehat',
        'Jumlah_Tumbuhan_Sakit',
        'Keterangan'
    ];

    public function Akun(){
        return $this->belongsTo(Akun::class, 'ID_Akun');
    }
}
