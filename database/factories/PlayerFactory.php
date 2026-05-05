<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Position;
use App\Models\Skill;
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
            'description' => [
                'en' => $this->faker->sentence,
                'ar' => $this->faker->sentence,
            ],
            'date_of_birth' => $this->faker->date(),
            'joined_at' => $this->faker->date(),
            'height' => $this->faker->numberBetween(160, 200),
            'weight' => $this->faker->numberBetween(50, 100),
            'jersey_number' => $this->faker->unique()->numberBetween(1, 99),
            'status' => $this->faker->randomElement(['active', 'banned', 'injured']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Player $player) {
            // add player image from this url : https://i.pravatar.cc/300?u=1
            $avatarId = rand(1, 70);
            $url = "https://i.pravatar.cc/300?u={$avatarId}";

            // إضافة الصورة باستخدام Spatie
            // ملاحظة: لو النت بطيء ممكن تستخدم try/catch هنا
            try {
                $player->addMediaFromUrl($url)->toMediaCollection('player_image');
            } catch (\Exception $e) {
                // لو النت فصل مثلاً، كمل باقي الـ Seed عادي
                logger('Failed to download image for player: '.$player->id);
            }
            // attach 3 skills with random probability from 1 to 5
            $skills = Skill::inRandomOrder()->take(3)->pluck('id');
            // attach skills with scores
            foreach ($skills as $skill) {
                $player->skills()->attach($skill, ['value' => $this->faker->numberBetween(0, 100)]);
            }
            $primaryPosition = Position::inRandomOrder()->first();
            $otherPositions = Position::inRandomOrder()->where('id', '!=', $primaryPosition->id)->take(2)->pluck('id');
            $positions = $otherPositions->merge([$primaryPosition->id]);
            // set primary position true for the primary position
            foreach ($positions as $position) {
                $player->positions()->attach($position, ['is_primary' => $position == $primaryPosition->id]);
            }
        });
    }
}
