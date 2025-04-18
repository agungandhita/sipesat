<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sktm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sktms';
    protected $primaryKey = 'sktm_id';
    
    protected $fillable = [
        'pengajuan_id',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'alamat',
        'keterangan',
        'keperluan',
    ];

    protected $dates = [
        'tanggal_lahir',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'pengajuan_id');
    }
}