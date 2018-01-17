<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
	public function scopeNoticiaActivo($query){
		return $query->where('activo',"si")->get();
	}
    protected $table = 'noticia';
    protected $fillable = [
        'nombre','imagen', 'descripcion','activo', 'orden'
    ];
}
