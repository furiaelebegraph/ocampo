<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    function (){
    	return $this->hasMany(Imagen::class, 'inmueble_id');
    }

    public static function obtenerImagenes($id){
    	return Ima::where('inmueble_id', '=', $id)->select('imagen','id', 'nombre')->orderBy('orden', 'asc')->get();
    }
	protected $table = 'ima';
    protected $fillable = [
        'nombre','imagen', 'inmueble_id', 'orden', 'activo'
    ];
}
