<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;// Uso de UUID como chave primaria

use App\Models\Course;
use App\Models\Shift;

class Team extends Model
{
    use HasUuids; // Define o tipo da coluna ID como uuid
    use HasFactory;
    
    /**
     * Tabela associada com o modelo.
     *
     * @var string
     */
    protected $table = 'team'; 

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'team_code',
        'team_name',
        'course',
        'shift'
    ];

    /**
     * Obter o turno ao qual o time pertence
     */
    public function shift(): BelongsTo {
        return $this->belongsTo(Shift::class, 'shift');
    }

    /**
     * Obter o curso ao qual o time pertence
     */
    public function course(): BelongsTo {
        return $this->belongsTo(Course::class, 'course');
    }
}
