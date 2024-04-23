<?php

namespace Database\Factories;

use App\Modules\Turmas\Core\Entities\Turma;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Turmas\Core\Entities\Turma>
 */
class TurmaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turma::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'curso' => fake()->randomElement(['Informática', 'Química', 'Administração', 'Alimentos']),
            'periodo' => fake()->randomElement([1, 2, 3]),
            'turno' => fake()->randomElement(['Manhã', 'Tarde', 'Noite']),
        ];
    }
}
