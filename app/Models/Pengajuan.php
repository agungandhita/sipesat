<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajuan extends Model
{
    use HasFactory, SoftDeletes;

    use HasFactory;

    protected $primaryKey = 'pengajuan_id';
    protected $fillable = ['nik', 'nama', 'tgl_pengajuan', 'status'];

    public function tidakMampu()
    {
        return $this->hasOne(TidakMampu::class, 'pengajuan_id', 'pengajuan_id');
    }

    public function pindahDomisili()
    {
        return $this->hasOne(PindahDomisili::class, 'pengajuan_id', 'pengajuan_id');
    }

    public function meninggal()
    {
        return $this->hasOne(Meninggal::class, 'pengajuan_id', 'pengajuan_id');
    }
}
