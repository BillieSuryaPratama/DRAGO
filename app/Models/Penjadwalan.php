<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    use HasFactory;
    protected $table = 'penjadwalan';
    protected $primaryKey = 'ID_Penjadwalan';
    public $timestamps = true;
    protected $fillable = [
        'ID_Akun',
        'JamMulai',
        'JamBerakhir',
        'Kegiatan',
        'Status',
        'Tanggal'
    ];

    public function Akun(){
        return $this->belongsTo(Akun::class, 'ID_Akun');
    }
}
