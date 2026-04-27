<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => [
                'en' => $this->faker->name,
                'ar' => $this->faker->name,
            ],
            'age' => $this->faker->numberBetween(18, 35),
            'height' => $this->faker->numberBetween(160, 200),
            'weight' => $this->faker->numberBetween(50, 100),
            'jersey_number' => $this->faker->unique()->numberBetween(1, 99),
            'status' => $this->faker->randomElement(['active', 'banned', 'injured']),
        ];
    }
}
