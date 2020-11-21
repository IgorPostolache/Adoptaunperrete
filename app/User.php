<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    const ADMINISTRADOR_TIPO = 'administrador';
    const BASICO_TIPO = 'registrado';
    const VERIFICADO_TIPO = 'basico';

    public function anuncios()
    {
        return $this->hasMany('App\Anuncio');
    }
    
    public function esAdministrador()
    {
        return $this->tipo === self::ADMINISTRADOR_TIPO;
    }
    public function esVerificado()
    {
        return $this->tipo === self::VERIFICADO_TIPO;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'provincia', 'ciudad', 'direccion', 'telefono', 'web', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
