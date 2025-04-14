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
    protected $fillable = ['nama', 'alamat', 'nik', 'jenis_kelamin', 'user_created', 'user_updated'];

    protected $guarded =[
        'warga_id'
    ];

}
