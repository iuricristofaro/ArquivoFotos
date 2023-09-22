<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basq extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
