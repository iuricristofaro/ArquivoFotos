<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lazer extends Model
{
    protected $fillable = [
        'title',
        'text',
        'image'
    ];
}
