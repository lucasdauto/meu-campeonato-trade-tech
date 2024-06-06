<?php

namespace App\Repositories\Championship;

use App\DTO\Championship\{CreateChampionshipDTO, UpdateChampionshipDTO};
use App\Models\Matches;
use App\Repositories\Championship\ChampionshipRepositoryInterface;
use App\Repositories\DefautEloquentORM;
use stdClass;

class ChampionshipEloquentORM implements ChampionshipRepositoryInterface
{
    public function __construct(protected Matches $model){}

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
        $championship = $this->model
                            ->find($id)
                            ->with(['teamA', 'teamB', 'championship'])
                            ->get();

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
}
