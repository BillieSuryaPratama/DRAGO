<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getDeteksiPenyakit($id = null)
    {
        if ($id) {
            return DB::table('deteksi_penyakit')
                ->join('akun', 'deteksi_penyakit.ID_Akun', '=', 'akun.ID_Akun')
                ->join('penyakit', 'deteksi_penyakit.ID_Penyakit', '=', 'penyakit.ID_Penyakit')
                ->select('deteksi_penyakit.*', 'akun.Nama', 'penyakit.Solusi', 'penyakit.Nama_Penyakit')
                ->where('ID_Deteksi', $id)
                ->first();
        } else {
            return DB::table('deteksi_penyakit')
                ->join('akun', 'deteksi_penyakit.ID_Akun', '=', 'akun.ID_Akun')
                ->join('penyakit', 'deteksi_penyakit.ID_Penyakit', '=', 'penyakit.ID_Penyakit')
                ->select('deteksi_penyakit.*', 'akun.Nama', 'penyakit.Solusi', 'penyakit.Nama_Penyakit')
                ->orderBy('created_at', 'desc')
                ->get();
        }
    }

    public function insertDataPenyakit($data)
    {
        DB::table('deteksi_penyakit')->insert([
            'ID_Akun' => $data->ID_Akun,
            'ID_Penyakit' => $data->ID_Penyakit,
            'Gambar_Deteksi' => $data->Gambar_Deteksi,
            'Akurasi' => $data->Akurasi,
            'Tanggal_Deteksi' => $data->Tanggal_Deteksi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
