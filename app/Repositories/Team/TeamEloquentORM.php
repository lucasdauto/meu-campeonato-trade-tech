<?php

namespace App\Repositories\Team;

use App\DTO\Team\{
    CreateTeamDTO,
    UpdateTeamDTO
};
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use stdClass;

class TeamEloquentORM implements TeamRepositoryInterface
{
    public function __construct(protected Team $model)
    {
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('name', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }
    public function findOne(string $id): stdClass | null
    {
        $team = DB::table('teams')
                ->select('teams.*', 'matches.team_a_score', 'matches.team_b_score', 'championships.name as championship_name', 'teamA.name as team_a_name', 'teamB.name as team_b_name')
                ->join('matches', function ($join) {
                    $join->on('teams.id', '=', 'matches.team_a_id')
                    ->orOn('teams.id', '=', 'matches.team_b_id');
                })
                ->join('championships', 'matches.championship_id', '=', 'championships.id')
                ->join('teams as teamA', 'matches.team_a_id', '=', 'teamA.id')
                ->join('teams as teamB', 'matches.team_b_id', '=', 'teamB.id')
                ->where('teams.id', $id)
                ->get();

        if ($team->isEmpty()) {
            return null;
        }

        $formattedMatches = $team->map(function ($match) {
            return [
                'championship_name' => $match->championship_name,
                'team_a_name' => $match->team_a_name,
                'team_b_name' => $match->team_b_name,
                'team_a_score' => $match->team_a_score,
                'team_b_score' => $match->team_b_score,
            ];
        });

        return (object) ['team' => $team->first(), 'matches' => $formattedMatches->toArray()];
    }
    public function new(CreateTeamDTO $dto): stdClass
    {
        return (object) $this->model
            ->create((array) $dto)
            ->toArray();
    }
    public function update(UpdateTeamDTO $dto): stdClass | null
    {
        if (!$team = $this->model->find($dto->id)) {
            return null;
        }
        $team->update((array) $dto);
        return (object) $team->toArray();
    }
    public function delete(string $id): bool
    {
        $team = $this->model->findOrFail($id);

        return $team->delete();
    }
}
