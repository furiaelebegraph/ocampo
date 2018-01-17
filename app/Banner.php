<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	public function scopeBannerActivo($query){
		return $query->where('activo',"si")->get();
	}
    protected $table = 'banner';
    protected $fillable = [
        'nombre','imagen', 'activo', 'orden'
    ];
}
