<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atual extends Model
{
    protected $fillable = [
        'title',
        'date',
        'texto',
        'image',
        'url',
        'description'
    ];

    public function setDateAttribute($value)
    {
        $date = date_create($value);

        $this->attributes['date'] = date_format($date,'Y-m-d');
    }

    public function getDateSiteAttribute()
    {
      $date = date_create($this->date);
      return date_format($date,'d/m/');
    }
}
