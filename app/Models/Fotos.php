<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Arquivo;

class Fotos extends Model
{
    
    protected $fillable = [
      "titulo","descricao", "url", "image"
    ];

    public function arquivo()
    {
      return $this->hasMany(Arquivo::class);
    }
  

}
