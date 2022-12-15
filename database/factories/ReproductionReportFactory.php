<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Reproductionrow;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReproductionReport>
 */
class ReproductionReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reproductionrow_id' => $this->faker->randomElement(Reproductionrow::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'nicHens' => $this->faker->randomNumber(5, false),
            'nicRoosters' => $this->faker->randomNumber(5, false),
            'cannibalismHens' => $this->faker->randomNumber(5, false),
            'cannibalismRoosters' => $this->faker->randomNumber(5, false),
            'debilityHens' => $this->faker->randomNumber(5, false),
            'debilityRoosters' => $this->faker->randomNumber(5, false),
            'otherHens' => $this->faker->randomNumber(5, false),
            'otherRoosters' => $this->faker->randomNumber(5, false),
            'fallsRemarks' => $this->faker->text,
            'goodEggs' => $this->faker->randomNumber(5, false),
            'badEggs' => $this->faker->randomNumber(5, false),
            'exportEggs' => $this->faker->randomNumber(5, false),
            'prevention' => $this->faker->text,
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


