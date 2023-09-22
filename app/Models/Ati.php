<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ati extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
