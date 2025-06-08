<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


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

    public function getDataKegiatan($id = null)
    {
        if ($id) {
            return DB::table('penjadwalan')
                ->join('akun', 'penjadwalan.ID_Akun', '=', 'akun.ID_Akun')
                ->select('penjadwalan.*', 'akun.Nama', 'akun.ID_Jabatan', 'akun.Status_Akun')
                ->where('ID_Deteksi', $id)
                ->first();
        } else {
            return DB::table('penjadwalan')
                ->join('akun', 'penjadwalan.ID_Akun', '=', 'akun.ID_Akun')
                ->select('penjadwalan.*', 'akun.Nama', 'akun.ID_Jabatan', 'akun.Status_Akun')
                ->orderBy('JamMulai', 'asc')
                ->get();
        }
    }

    public function insertDataKegiatan(Request $request)
    {
        DB::table('penjadwalan')->insert([
            'ID_Akun' => $request->ID_Akun,
            'JamMulai' => $request->JamMulai,
            'JamBerakhir' => $request->JamBerakhir,
            'Kegiatan' => $request->Kegiatan,
            'Tanggal' => $request->Tanggal,
            'Status' => 'Belum Dikerjakan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
