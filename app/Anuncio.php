<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
	//Nombre de la tabla
    protected $table = 'anuncios';
    protected $fillable = ['nombre', 'avatar', 'fecha_nacimiento', 'sexo', 'descripcion', 'user_id', 'raza', 'provincia', 'telefono', 'correo'];
    public function usuario()
    {
    	return $this->belongsTo('App\User');
    }
    public function scopeProvincia($query, $provincia){
		if($provincia)
			return $query->where('provincia', 'LIKE', "%$provincia%");
	}	
	public function scopeRaza($query, $raza){
			if($raza)
				return $query->where('raza', 'LIKE', "%$raza%");
	}
	public function scopeSexo($query, $sexo){
		if($sexo)
			return $query->where('sexo', 'LIKE', "%$sexo%");
	}
}
