<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inf extends Model
{
    protected $fillable = [
        'titulo',
        'texto',
        'description',
        'url'
    ];
}
