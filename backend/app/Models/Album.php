<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $fillable = [
        'photographerId',
        'title',
        'description',
        'featured',
        'album_date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
