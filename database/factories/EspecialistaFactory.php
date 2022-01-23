<?php

namespace Database\Factories;

use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class EspecialistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $especialidades = Especialidad::pluck('id')->toArray();
        return [
            'nombre' => $this->faker->name(),
            'especialidad_id' => $this->faker->randomElement($especialidades),
        ];
    }
}
