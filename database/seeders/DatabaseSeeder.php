<?php

namespace Database\Seeders;

use App\Models\Championship;
use App\Models\Team;
use App\Models\User;
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

        User::factory()->create([
            'name' => 'Lucas',
            'email' => 'teste@teste.com',
        ]);

        // creating eight teams
        Team::factory()->count(8)->create();

        // creating a championship
        Championship::factory()->create();


    }
}
