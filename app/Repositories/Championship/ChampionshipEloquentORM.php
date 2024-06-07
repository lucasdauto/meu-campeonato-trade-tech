<?php

namespace App\Repositories\Championship;

use App\DTO\Championship\CreateChampionshipDTO;
use App\DTO\Championship\UpdateChampionshipDTO;
use App\DTO\Team\UpdateTeamDTO;
use App\Models\Championship;
use App\Models\Matches;
use App\Models\Team;
use App\Repositories\Championship\ChampionshipRepositoryInterface;
use App\Repositories\DefautEloquentORM;
use stdClass;

class ChampionshipEloquentORM implements ChampionshipRepositoryInterface
{
    public function __construct(protected Championship $model){}

    public function getAll(string $filter): array
    {
        return $this->model
                    ->where(function($query) use ($filter) {
                        if ($filter) {
                            $query->where('name', 'like', "%{$filter}%");
                        }
                    })
                    ->all()
                    ->toArray();
    }

    public function findOne(string $id): stdClass | null
    {
        $championship = $this->model->find($id);

        if(!$championship) {
            return null;
        }

        return (object) $championship->toArray();
    }
    public function new(CreateChampionshipDTO $dto): stdClass
    {
        return (object) $this->model
                            ->create((array) $dto)
                            ->toArray();
    }
    public function update(UpdateChampionshipDTO $dto): stdClass | null
    {
        if(!$championship = $this->model->find($dto->id))
        {
            return null;
        }
        $championship->update((array) $dto);
        return (object) $championship->toArray();
    }
    public function delete(string $id): bool
    {
        $championship = $this->model->findOrFail($id);

        return $championship->delete();
    }

    public function simulate(): void
    {
        $teams = Team::all()->shuffle();
        $match = [];

        $championship = $this->model->findOrFail();

        while(count($teams) > 1) {
            $team1 = $teams->pop();
            $team2 = $teams->pop();

            $output = shell_exec('python3 ' . base_path('teste.py'));
            list($score1, $score2) = explode("\n", trim($output));

            $match = Matches::create([
            'team1_id' => $team1->id,
            'team2_id' => $team2->id,
            'score_team1' => $score1,
            'score_team2' => $score2,
            'championship_id' => $championship->id,
            ]);

            $matches[] = $match;
        }
    }
}
