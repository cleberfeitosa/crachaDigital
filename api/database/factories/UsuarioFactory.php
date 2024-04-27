<?php

namespace Database\Factories;

use App\Modules\Usuarios\Core\Entities\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Usuarios\Core\Entities>
 */
class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'matricula' => strval(fake()->unique()->numberBetween(100000000000000, 999999999999)),
            'password' => Hash::make('12345'),
            'papel' => fake()->randomElement(['coordenador', 'vigilante']),
        ];
    }
}
