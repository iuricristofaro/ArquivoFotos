<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Id extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
