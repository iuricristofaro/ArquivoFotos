<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atividades extends Model
{
    protected $fillable = [
        'title',
        'text',
        'titulo',
        'texto',
        'image'
    ];
}
