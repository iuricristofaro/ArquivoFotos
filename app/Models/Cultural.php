<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cultural extends Model
{
    protected $fillable = [
        'title',
        'text',
        'image',
        'description',
        'url'
    ];
}
