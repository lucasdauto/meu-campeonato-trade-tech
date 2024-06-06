<?php

namespace App\DTO\Match;

use Illuminate\Http\Request;
use App\DTO\DTOInterface;

class UpdateMatchDTO
{
    public function __construct(
        public int|string $team_a_id,
        public int|string $team_b_id,
        public int $team_a_score,
        public int $team_b_score,
        public int|string $championship_id,
        public int|string $id
    ){}

    public static function makeFromRequest(Request $request, string|int $id): self
    {
        return new self(
            $request->input('team_a_id'),
            $request->input('team_b_id'),
            $request->input('team_a_score'),
            $request->input('team_b_score'),
            $request->input('championship_id'),
            $id
        );
    }
}
