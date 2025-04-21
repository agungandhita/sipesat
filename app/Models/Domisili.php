<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    use HasFactory;

    protected $primaryKey = 'domisili_id';
    protected $fillable = [
        'pengajuan_id',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',  // Add this
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
