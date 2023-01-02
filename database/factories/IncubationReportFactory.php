<?php

namespace Database\Factories;

use App\Models\Incubationincubator;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IncubationReport>
 */
class IncubationReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'incubationincubator_id' => $this->faker->randomElement(Incubationincubator::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'impregnation' => $this->faker->randomFloat(2, 1, 100),
            'remarks' => $this->faker->word(15),
            'eggTest' => $this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks',
            ),
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
