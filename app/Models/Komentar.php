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
        'parent_id',
        'isi_komentar'
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'user_id');
}

    public function informasi()
    {
        return $this->belongsTo(Informasi::class, 'informasi_id', 'informasi_id');
    }

    // Relationship for replies
    public function replies()
    {
        return $this->hasMany(Komentar::class, 'parent_id', 'komentar_id')
                    ->with('user', 'replies')
                    ->latest();
    }

    // Relationship for parent comment
    public function parent()
    {
        return $this->belongsTo(Komentar::class, 'parent_id', 'komentar_id');
    }

    // Check if comment is a reply
    public function isReply()
    {
        return !is_null($this->parent_id);
    }

    // Get only parent comments (not replies)
    public function scopeParentComments($query)
    {
        return $query->whereNull('parent_id');
    }
}
