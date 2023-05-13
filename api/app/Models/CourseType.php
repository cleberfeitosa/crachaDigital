<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;// Uso de UUID como chave primaria

class CourseType extends Model
{
    use HasUuids;
    use HasFactory;

    /**
     * Tabela associdada com o modelo.
     *
     * @var string
     */
    protected $table = 'course_type';

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'course_type'
    ];

    /**
     * Obter cursos a partir do tipo de curso
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
