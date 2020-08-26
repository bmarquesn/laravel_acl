<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'usuario_id', 'razao_social', 'nome_fantasia', 'cnpj', 'ativo',
    ];

    /**
     * Get the endereco record associated with the empresa.
     */
    public function empresa()
    {
        return $this->hasMany('App\Models\Endereco');
        /** se no Endereco a foreign_key de Endereco estiver diferente */
        //return $this->hasOne('App\Models\Endereco', 'foreign_key');
    }
}
