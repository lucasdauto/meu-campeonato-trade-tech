<?php

namespace App\DTO\Match;
use Illuminate\Http\Request;

class CreateMatchDTO
{
    public function __construct(
        public int|string $team_a_id,
        public int|string $team_b_id,
        public int $team_a_score,
        public int $team_b_score,
        public int|string $championship_id,
    ) {}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->get('team_a_id'),
            $request->get('team_b_id'),
            $request->get('team_a_score'),
            $request->get('team_b_score'),
            $request->get('championship_id'),
        );
    }
}
