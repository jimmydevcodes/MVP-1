<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessionalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'specialty' => $this->faker->randomElement(['psicologia', 'psiquiatria', 'terapeuta']),
            'license_number' => $this->faker->randomElement(['PSI', 'PSQ', 'TER']) . $this->faker->numerify('####'),
            'about' => $this->faker->paragraph(),
            'is_active' => true,
        ];
    }
}