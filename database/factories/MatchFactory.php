<?php

namespace Database\Factories;

use App\Models\Championship;
use App\Models\Matches;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matches>
 */
class MatchFactory extends Factory
{

     protected $model = Matches::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'team1_id' => Team::factory(),
            'team2_id' => Team::factory(),
            'score_team1' => $this->faker->numberBetween(0, 7),
            'score_team2' => $this->faker->numberBetween(0, 7),
            'championship_id' => Championship::factory(),
        ];
    }
}
