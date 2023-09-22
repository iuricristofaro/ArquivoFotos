<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laz extends Model
{
    protected $fillable = [
        'titulo',
        'texto',
        'description',
        'url'
    ];
}
