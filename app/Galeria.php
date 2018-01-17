<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    function imagenes(){
    	return $this->hasMany(Imagen::class, 'galeria_id');
    }

    public static function obtenerImagenes($id){
    	return Imagen::where('imagen_id', '=', $id)->select('imagen','id', 'nombre')->orderBy('orden', 'asc')->get();
    }
	protected $table = 'galeria';
    protected $fillable = [
        'nombre','imagen', 'descripcion', 'orden', 'activo'
    ];
}
