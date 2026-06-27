<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'type',
        'year',
        'description',
        'cover_image',
        'is_published',
    ];

    public function images()
    {
        return $this->hasMany(ArtworkImage::class)->orderBy('position');
    }
}
