<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory, HasUuids;

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
        'identificacao',
        'senha',
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
}
