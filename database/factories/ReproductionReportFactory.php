<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Reproductionrow;
use App\Models\Reproductionrowcages;
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
            'reproductionrowcage_id' => $this->faker->randomElement(Reproductionrowcages::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'nicHens' => $this->faker->numberBetween(0, 3),
            'nicRoosters' => $this->faker->numberBetween(0, 3),
            'cannibalismHens' => $this->faker->numberBetween(0, 3),
            'cannibalismRoosters' => $this->faker->numberBetween(0, 3),
            'debilityHens' => $this->faker->numberBetween(0, 3),
            'debilityRoosters' => $this->faker->numberBetween(0, 3),
            'otherHens' => $this->faker->numberBetween(0, 3),
            'otherRoosters' => $this->faker->numberBetween(0, 3),
            'fallsRemarks' => $this->faker->word(15),
            'goodEggs' => $this->faker->randomNumber(2, false),
            'badEggs' => $this->faker->randomNumber(2, false),
            'exportEggs' => $this->faker->randomNumber(2, false),
            'prevention' => $this->faker->word(15),
            'remarks' => $this->faker->word(15),
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


