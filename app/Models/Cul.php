<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cul extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
