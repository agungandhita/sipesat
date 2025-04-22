<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $primaryKey = 'komentar_id';
    
    protected $fillable = [
        'user_id',
        'informasi_id',
        'konten'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function informasi()
    {
        return $this->belongsTo(Informasi::class);
    }
}