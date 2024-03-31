<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LiberacaoDiscente extends Model
{
    use HasFactory, HasUuids;


    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'liberacao_turma_id',
        'discente_id',
        'vigilante_id',
        'situacao',
        'decidido_em',
        'motivoNegacao',
    ];

    public function liberacaoTurma(): BelongsTo
    {
        return $this->belongsTo(liberacaoTurma::class);
    }

    public function discente(): BelongsTo
    {
        return $this->belongsTo(Discente::class);
    }

    public function vigilante(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
}
