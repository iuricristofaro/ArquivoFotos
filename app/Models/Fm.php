<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fm extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
