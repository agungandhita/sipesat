<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "penduduks";
    protected $primaryKey = 'warga_id';
    protected $fillable = [
        'nama',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'pendidikan',
        'user_created',
        'user_updated'
    ];
    protected $guarded = [
        'warga_id'
    ];

    protected $dates = [
        'tanggal_lahir',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Scope untuk filter berdasarkan RT
     */
    public function scopeRT($query, $rt)
    {
        return $query->where('rt', $rt);
    }

    /**
     * Scope untuk filter berdasarkan Dusun
     */
    public function scopeDusun($query, $dusun)
    {
        return $query->where('dusun', $dusun);
    }

    /**
     * Mendapatkan usia penduduk berdasarkan tanggal lahir
     */
    public function getUsiaAttribute()
    {
        if ($this->tanggal_lahir) {
            return $this->tanggal_lahir;
        }
        return null;
    }

    /**
     * Relasi ke model User untuk pembuat data
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_created');
    }

    /**
     * Relasi ke model User untuk pengubah data terakhir
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'user_updated');
    }
}
