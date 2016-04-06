<?php

/**
* 
*/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
	protected $table='entradas';
	protected $guarded=['id','created_at']; //siempre se debe asignar

	public function categorias()
    {
        return $this->belongsToMany('App\Models\Categoria', 'entrada_categoria', 'fk_entrada', 'fk_categoria');
    }

	public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'fk_usuario');
    }
}