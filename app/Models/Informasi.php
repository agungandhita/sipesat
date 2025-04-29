<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Informasi extends Model
{
    use HasFactory;
    use Sluggable; // Tambahkan trait Sluggable

    protected $table = 'informasi';
    protected $primaryKey = 'informasi_id';
    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'gambar_sampul',
        'status',
        'user_id'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'informasi_id');
    }
}
