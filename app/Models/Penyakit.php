<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakit';
    protected $primaryKey = 'ID_Penyakit';
    public $timestamps = true;
    protected $fillable = [
        'Nama_Penyakit',
        'Solusi'
    ];

    public function DeteksiPenyakit(){
        return $this->hasMany(DeteksiPenyakit::class, 'ID_Penyakit');
    }
}
