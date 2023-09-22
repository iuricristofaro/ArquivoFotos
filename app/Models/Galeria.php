<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Imagem;

class Galeria extends Model
{
    protected $fillable = [
        'imagem_id','titulo', 'descricao', 'url', 'ordem','deletado'
    ];
  
    
  
    public function imagem()
    {
      return $this->belongsTo(Imagem::class);
    }
  
    public function getUrlAttribute($value)
    {
        $imagem = $this->imagem;
        $url = $imagem->arquivos()->where('tamanho','=','G')->first()->url;
  
        return asset($url);
    }
}
