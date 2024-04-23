<?php

namespace App\Modules\Turmas\Core\Entities;

use App\Models\Discente;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'curso',
        'periodo',
        'turno'
    ];

    public function discentes(): HasMany
    {
        return $this->hasMany(Discente::class);
    }
}
