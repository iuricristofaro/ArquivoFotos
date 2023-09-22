<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pi extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
