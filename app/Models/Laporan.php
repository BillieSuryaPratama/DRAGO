<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getDataLaporan($id = null)
    {
        if ($id) {
            return DB::table('Laporan')->where('ID_Laporan', $id)->first();
        } else {
            return DB::table('Laporan')->get();
        }
    }

    public function insertDataLaporan($request)
    {
        DB::table('Laporan')->insert([
            'Jumlah_Tumbuhan_Sakit' => $request->Jumlah_Tumbuhan_Sakit,
            'Jumlah_Tumbuhan_Sehat' => $request->Jumlah_Tumbuhan_Sehat,
            'Keterangan' => $request->Keterangan,
            'Tanggal_Laporan' => $request->Tanggal_Laporan,
            'ID_Akun' => $request->ID_Akun,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    public function updateDataLaporan(Request $request)
    {
        DB::table('laporan')->where('ID_Laporan', $request->ID_Laporan)->update([
            'Jumlah_Tumbuhan_Sakit' => $request->Jumlah_Tumbuhan_Sakit,
            'Jumlah_Tumbuhan_Sehat' => $request->Jumlah_Tumbuhan_Sehat,
            'Keterangan' => $request->Keterangan,
            'Tanggal_Laporan' => $request->Tanggal_Laporan,
            'updated_at' => now(),
        ]);
    }
    public function deleteDataLaporan($id)
    {
    DB::table('Laporan')->where('ID_Laporan', $id)->delete();
    }
}
