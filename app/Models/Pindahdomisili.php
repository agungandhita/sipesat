<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pindahdomisili extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "pindahdomisilis";
    protected $primaryKey = 'pindah_id';

    protected $guarded =[
        'pindah_id'
    ];

}
