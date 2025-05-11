<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileDesa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profile_desa';

    protected $primaryKey = 'profil-desa-id';

    protected $fillable = [
        'nama',
        'jabatan',
        'keterangan',
        'user_created',
        'user_updated',
        'user_deleted',
        'deleted'
    ];
}
