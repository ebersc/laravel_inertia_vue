<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    const CREATED_AT = 'create_at';

    const UPDATED_AT = 'update_at';

    protected $table = 'users';

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone',
        'ativo',
        'data_nascimento',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'data_nascimento' => 'date',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
