<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompaniaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'denominacion' => $this->faker->sentence(),
        ];
    }
}
