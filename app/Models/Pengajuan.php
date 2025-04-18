<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $primaryKey = 'pengajuan_id';
    protected $fillable = [
        'user_id',
        'jenis_surat',
        'status',
        'catatan_admin',
        'approved_at',
        'approved_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Add this method to your Pengajuan model
    public function sktm()
    {
        return $this->hasOne(Sktm::class, 'pengajuan_id', 'pengajuan_id');
    }

    public function domisili()
    {
        return $this->hasOne(Domisili::class, 'pengajuan_id');
    }

    public function arsip()
    {
        return $this->hasOne(Arsip::class, 'pengajuan_id');
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }
}