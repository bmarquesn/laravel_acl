<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'usuario_id', 'razao_social', 'nome_fantasia', 'cnpj', 'ativo',
    ];
}
