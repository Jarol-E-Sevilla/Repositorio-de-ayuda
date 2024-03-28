<?php

namespace Database\Factories;

use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    private static $pacienteIds;

    protected $model = Consulta::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'fecha_visita'=>fake()->date,
            'motivo_visita'=>fake()->sentence,
            'atendido'=>fake()->name,
            'paciente_id' => $this->getUniquePacienteId(),
        ];
    }
    // Método para obtener un id único de paciente
    protected function getUniquePacienteId()
    {
        // Obtener todos los ids de pacientes
        $pacienteIds = Paciente::pluck('id');

        // Seleccionar un id aleatorio de la colección
        return $pacienteIds->random();
    }
}
