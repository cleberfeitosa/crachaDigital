<?php

namespace Database\Factories;

use App\Modules\Turmas\Core\Entities\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Cursos\Core\Entities\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->randomElement(['Informática', 'Química', 'Administração', 'Alimentos']),
        ];
    }
}
