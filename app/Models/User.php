<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone',
        'ativo',
        'data_nascimento',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'data_nascimento' => 'date',
    ];
}