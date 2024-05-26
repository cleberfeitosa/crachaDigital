<?php

namespace App\Modules\Discentes\Core\Entities;

use App\Modules\Discentes\Core\Entities\LiberacaoDiscente;
use App\Modules\Turmas\Core\Entities\Turma;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discente extends Model
{
    use HasFactory, HasUuids;

    /**
     * Tabela associada com o modelo.
     *
     * @var string
     */
    protected $table = 'discentes';

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'matricula',
        'turma_id',
    ];


    public function turma(): BelongsTo
    {
        return $this->belongsTo(Turma::class);
    }

    public function liberacaoAlunos(): HasMany
    {
        return $this->hasMany(LiberacaoDiscente::class);
    }
}
