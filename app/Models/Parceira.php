<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parceira extends Model
{
    protected $fillable = [
        'titulo',
        'texto',
        'image'
    ];
}
