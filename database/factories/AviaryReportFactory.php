<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Aviaryplace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AviaryReport>
 */
class AviaryReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'aviaryplace_id' => $this->faker->randomElement(Aviaryplace::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'feeding' => $this->faker->text,
            'cure' => $this->faker->text,
            'hensExport' => $this->faker->randomNumber(3, false),
            'roostersExport' => $this->faker->randomNumber(3, false),
            'destination' => $this->faker->text,
            'hensFalls' => $this->faker->randomNumber(2, false),
            'roostersFalls' => $this->faker->randomNumber(2, false),
            'remarksFalls' => $this->faker->text,
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
