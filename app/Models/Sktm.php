<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    use HasFactory;

    protected $primaryKey = 'sktm_id';
    protected $fillable = [
        'pengajuan_id',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'alamat',
        'keterangan',
        'keperluan'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
}