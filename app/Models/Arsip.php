<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arsip extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "arsips";
    protected $primaryKey = 'arsip_id';

    protected $guarded = [
        'arsip_id'
    ];

    protected $fillable = [
        'perihal',
        'jenis_surat',
        'asal_surat',
        'tanggal_surat',
        'keterangan',
        'file_surat',
        'user_deleted',
        'deleted',
    ];
}
