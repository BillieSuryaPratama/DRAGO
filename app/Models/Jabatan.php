<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $primaryKey = 'ID_Jabatan';
    public $timestamps = true;
    protected $fillable = [
        'Nama_Jabatan'
    ];

    public function Akun(){
        return $this->hasMany(Akun::class, 'ID_Jabatan');
    }
}
