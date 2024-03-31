<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LiberacaoTurma extends Model
{

    use HasFactory, HasUuids;

    /**
     * Tabela associada com o modelo.
     *
     * @var string
     */
    protected $table = 'liberacao_turmas';

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'turma_id',
        'coordenador_id',
        'situacao',
    ];


    public function turma(): BelongsTo
    {
        return $this->belongsTo(Turma::class);
    }

    public function coordenador(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function liberacaoAlunos(): HasMany
    {
        return $this->hasMany(LiberacaoDiscente::class);
    }
}
