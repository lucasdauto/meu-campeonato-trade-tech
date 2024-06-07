<?php

namespace Database\Seeders;

use App\Models\Championship;
use App\Models\Matches;
use App\Models\Team;
use App\Models\User;
use Database\Factories\MatchFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Lucas',
        //     'email' => 'teste@teste.com',
        // ]);

        // creating eight teams
        $teams = Team::factory()->count(8)->create();

        // creating a championship
        $championship = Championship::factory()->create();

        $matches = [
            [$teams[0], $teams[1]],
            [$teams[2], $teams[3]],
            [$teams[4], $teams[5]],
            [$teams[6], $teams[7]],
        ];

        foreach ($matches as $match) {
            Matches::factory()->create([
                'team_a_id' => $match[0]->id,
                'team_b_id' => $match[1]->id,
                'championship_id' => $championship->id,
            ]);
        }


    }
}
