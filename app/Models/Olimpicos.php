<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Olimpicos extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url',
        'image'
    ];
}
