<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias'; //con que tabla trabajar
    protected $guarded = ['id', 'created_at', 'updated_at']; //proteger los campos

    public function entradas()
    {
        return $this->belongsToMany('App\Models\Entrada', 'entrada_categoria', 'fk_categoria', 'fk_entrada');
    }
}