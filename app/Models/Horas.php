<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horas extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
