<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fotos;

class Arquivo extends Model
{

	public $timestamps = false;


    protected $fillable = [
        "fotos_id", "image"
      ];
  
      public function fotos()
      {
        return $this->belongsTo(Fotos::class);
      }
}
