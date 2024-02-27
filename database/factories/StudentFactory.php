<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;

    public function definition()
    {
        return [
            'Nama' => $this->faker->unique()->word,
            'NIS' => $this->faker->unique()->randomNumber(8),
            'KelasId' => $this->faker->numberBetween(1, 4),
            'Alamat' => $this->faker->address(),
            // Add other fields as needed
        ];
    }
}
