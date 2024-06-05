<?php

namespace App\DTO\Match;

class CreateMatchDTO
{
    public function __construct(
        public int|string $team_a_id,
        public int|string $team_b_id,
        public int $team_a_score,
        public int $team_b_score,
        public int|string $championship_id,
    ) {}
}
