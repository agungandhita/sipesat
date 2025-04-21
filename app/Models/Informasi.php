<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';
    
    protected $fillable = [
        'judul',
        'konten',
        'kategori',
        'status',
        'slug'
    ];

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}