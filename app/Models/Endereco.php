<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'empresa_id', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'ativo',
    ];
}
