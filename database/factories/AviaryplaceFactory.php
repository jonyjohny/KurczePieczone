<?php

namespace Database\Factories;

use App\Models\Aviary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AviaryPlace>
 */
class AviaryplaceFactory extends Factory
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
            'id_aviary' => $this->faker->randomElement(Aviary::pluck('id')),
            'id_user' => $this->faker->randomElement(User::pluck('id')),
            'animals' => $this->faker->randomNumber(3, false),
            'hens' => $this->faker->randomNumber(3, false),
            'roosters' => $this->faker->randomNumber(3, false),
            'age' => $this->faker->randomNumber(2, false),
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
