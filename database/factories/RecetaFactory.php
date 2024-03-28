<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receta>
 */
class RecetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        /*$table->string('nombre');
            $table->string('procedencia');
            $table->integer('edad');
            $table->date('fecha');
            $table->integer('#exp');*/
        return [
            //
            'nombre'=>fake()->name,
            'procedencia'=>fake()->sentence,
            'edad'=>fake()->numberBetween(1, 99),
            'fecha'=>fake()->date,
            '#exp'=>fake()->numerify('####')
        ];
    }
}
