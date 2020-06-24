<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        "descricao"
    ];
 
    public function produtos(){
        return $this->belongsToMany('App\Produto', 'categoria_produto');
    }
}
