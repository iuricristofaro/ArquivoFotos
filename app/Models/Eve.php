<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eve extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
