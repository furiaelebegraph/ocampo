<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    function galeria(){
    	return $this->belongsTo(Galeria::class, 'galeria_id');
    }

    public static function obtenerImagenes($id){
    	return Ima::where('inmueble_id', '=', $id)->select('imagen','id', 'nombre')->orderBy('orden', 'asc')->get();
    }
	protected $table = 'ima';
    protected $fillable = [
        'nombre','imagen', 'galeria_id', 'orden', 'activo'
    ];
}
