<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseType extends Model
{
    use HasFactory;

    protected $table = 'course_type';

    /**
     * Obter cursos a partir do tipo de curso
     */
    public function courses(): HasMany {
        return $this->hasMany(Course::class);
    }
}
