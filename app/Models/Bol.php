<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bol extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
