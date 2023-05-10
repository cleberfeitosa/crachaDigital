<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course'; 

    /**
     * Obter o tipo de curso a partir do curso
     */
    public function courseType(): BelongsTo {
        return $this->belongsTo(CourseType::class, 'course_type');
    }
}
