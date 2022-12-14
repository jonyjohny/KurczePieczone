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
            'reproductionrows_id' => $this->faker->randomElement(Reproductionrow::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
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
