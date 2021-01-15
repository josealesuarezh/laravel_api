<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const USUARIO_VERIFICADO = "1";
    const USUARIO_NO_VERIFICADO = "0";
    const USUARIO_ADMINISTRADOR = "true";
    const USUARIO_REGULAR = "false";

    protected $table = "users";
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    public function setNameAttribute($valor): string
    {
        return $this->attributes['name'] = strtolower($valor);
    }

    public function setEmailAttribute($valor): string
    {
        return $this->attributes['email'] = strtolower($valor);
    }

    public function getNameAttribute($valor): string
    {
        return ucwords($valor);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    public function esVerificado(){
        return $this->verified == User::USUARIO_VERIFICADO;
    }
    public function esAdministrador(){
        return $this->admin == User::USUARIO_ADMINISTRADOR;
    }

    public static function generarVerificationToken(){
        return str_random(40);
    }
}
