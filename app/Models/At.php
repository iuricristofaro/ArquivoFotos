<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class At extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
