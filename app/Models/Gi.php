<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gi extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'url'
    ];
}
