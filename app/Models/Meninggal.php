<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    protected $primaryKey = 'meninggal_id';
    
    protected $fillable = [
        'pengajuan_id',
        'nama_pejabat',
        'jabatan',
        'nik_almarhum',
        'nama_almarhum',
        'tempat_lahir_almarhum',
        'tanggal_lahir_almarhum',
        'jenis_kelamin',
        'warga_negara',
        'agama',
        'pekerjaan_almarhum',
        'alamat_almarhum',
        'tanggal_meninggal',
        'sebab_meninggal',
        'tempat_meninggal',
        'nik_pelapor',
        'nama_pelapor',
        'tempat_lahir_pelapor',
        'tanggal_lahir_pelapor',
        'jenis_kelamin_pelapor',
        'alamat_pelapor',
    ];

    protected $casts = [
        'tanggal_lahir_almarhum' => 'date',
        'tanggal_meninggal' => 'date',
        'tanggal_lahir_pelapor' => 'date',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'pengajuan_id');
    }
}