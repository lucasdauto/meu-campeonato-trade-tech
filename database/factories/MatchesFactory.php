<?php

namespace Database\Factories;

use App\Models\Championship;
use App\Models\Matches;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matches>
 */
class MatchesFactory extends Factory
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
            'team_a_id' => Team::factory(),
            'team_b_id' => Team::factory(),
            'team_a_score' => $this->faker->numberBetween(0, 7),
            'team_b_score' => $this->faker->numberBetween(0, 7),
            'championship_id' => Championship::factory(),
        ];
    }
}
