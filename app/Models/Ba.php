<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ba extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}