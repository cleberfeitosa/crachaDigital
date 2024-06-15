<?php

namespace App\Modules\Turmas\Core\Entities;

use App\Modules\Discentes\Core\Entities\Discente;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turma extends Model
{
    use HasFactory, HasUuids;

    /**
     * Tabela associada com o modelo.
     *
     * @var string
     */
    protected $table = 'turmas';

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'curso_id',
        'periodo',
        'turno'
    ];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function discentes(): HasMany
    {
        return $this->hasMany(Discente::class);
    }
}
