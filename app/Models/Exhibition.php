<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    protected $fillable = [
        'title',
        'location',
        'start_date',
        'end_date',
        'description',
        'is_published',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
