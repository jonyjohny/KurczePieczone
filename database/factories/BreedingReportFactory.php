<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Breedingplace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BreedingReport>
 */
class BreedingReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'breedingplace_id' => $this->faker->randomElement(Breedingplace::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'falls' => $this->faker->randomNumber(5, false),
            'selection' => $this->faker->randomNumber(5, false),
            'mainTemperature' => $this->faker->randomFloat(2, 1, 100),
            'hallTemperature' => $this->faker->randomFloat(2, 1, 100),
            'humidity' => $this->faker->randomFloat(2, 1, 100),
            'fodder' => $this->faker->text,
            'water' => $this->faker->text,
            'lighting' => $this->faker->text,
            'lightingRemarks' => $this->faker->text,
            'ventilation' => $this->faker->text,
            'animalsTaken' => $this->faker->text,
            'destination' => $this->faker->text,
            'remarks' => $this->faker->text,
            'created_at' => $this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks',
            ),
            'updated_at' => $this->faker->dateTimeBetween(
                '- 4 weeks',
                '- 1 weeks',
            ),
            'deleted_at' => rand(0, 10) === 0 ? $this->faker->dateTimeBetween(
                    '- 1 weeks',
                    '+ 2 weeks',
            )
            : null,
        ];
    }
}
