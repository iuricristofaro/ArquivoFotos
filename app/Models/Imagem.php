<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Arquivo;
use App\Models\Fotos;

class Imagem extends Model
{
    protected $table = "imagens";
	
    protected $fillable = [
      "titulo","descricao","deletado"
    ];

    public function arquivos()
    {
      return $this->hasMany(Arquivo::class);
    }

    public function fotos()
    {
      return $this->hasMany(Fotos::class);
    }

    public function pequenaUrl()
    {
      $url = asset($this->arquivos()->where('tamanho','=','P')->first()->url);
      return $url;
    }

    public function galeriaUrl()
    {
      $url = asset($this->arquivos()->where('tamanho','=','G')->first()->url);
      return $url;
    }

    public function slideUrl()
    {
      $url = asset($this->arquivos()->where('tamanho','=','S')->first()->url);
      return $url;
    }
}
