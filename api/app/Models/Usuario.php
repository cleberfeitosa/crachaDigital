<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, HasUuids, Notifiable;

    /**
     * Tabela associada com o modelo.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'matricula',
        'password',
        'papel'
    ];

    public function liberacaoTurmas(): HasMany
    {
        return $this->HasMany(LiberacaoTurma::class);
    }

    public function liberacaoDiscentes(): HasMany
    {
        return $this->HasMany(LiberacaoDiscente::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
