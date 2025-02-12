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
    protected $fillable = ['nama', 'alamat', 'nik', 'user_created'];

    protected $guarded =[
        'warga_id'
    ];

}
