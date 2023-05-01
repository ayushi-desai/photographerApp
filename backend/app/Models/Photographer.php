<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Album;

class Photographer extends Model
{
    use HasFactory;

    protected $table = 'photographers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'bio',
        'profile_picture'
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
