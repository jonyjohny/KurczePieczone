<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Incubation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incubationincubator>
 */
class IncubationincubatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(1),
            'remarks' => $this->faker->word(15),
            'id_incubation' => $this->faker->randomElement(Incubation::pluck('id')),
            'id_user' => $this->faker->randomElement(User::pluck('id')),
            'eggs' => $this->faker->randomNumber(3, false),
            'added' => $this->faker->dateTimeBetween(
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
