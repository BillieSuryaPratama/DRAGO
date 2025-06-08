<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getDataAkun($id = null)
    {
        if ($id) {
            return DB::table('akun')->where('ID_Akun', $id)->first();
        } else {
            return DB::table('akun')->get();
        }
    }

    public function insertDataAkun(Request $request)
    {
        DB::table('akun')->insert([
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'Nomor_HP' => $request->Nomor_HP,
            'Username' => $request->Username,
            'Email' => $request->Email,
            'Sandi' => $request->Sandi,
            'Status_Akun' => 1,
            'ID_Jabatan' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function deleteDataAkun($id)
    {
        DB::table('akun')->where('ID_Akun', $id)->update([
            'Status_Akun' => 0,
            'updated_at' => now(),
        ]);
    }


    public function updateDataAkun(Request $request, $id)
    {
        DB::table('akun')->where('ID_Akun', $id)->update([
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'Nomor_HP' => $request->Nomor_HP,
            'Username' => $request->Username,
            'Email' => $request->Email,
            'Sandi' => $request->Sandi,
            'updated_at' => now(),
        ]);
    }
}
