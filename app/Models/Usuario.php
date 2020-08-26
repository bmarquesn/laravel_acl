<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * 2020-07-27 - Bruno Nogueira
     * Utilizando o ACL do Laravel, não há como utilizar uma tabela diferente de "users" para a tabela de "usuarios"
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ativo' ,
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

    /**
     * Get the empresa record associated with the user.
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa');
        /** se na Empresa a foreign_key de usuario estiver diferente */
        //return $this->hasOne('App\Phone', 'foreign_key');
    }
}
