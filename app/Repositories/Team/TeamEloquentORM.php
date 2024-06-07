<?php

namespace App\Repositories\Team;

use App\DTO\Team\{CreateTeamDTO, UpdateTeamDTO
};
use App\Models\Team;
use stdClass;

class TeamEloquentORM implements TeamRepositoryInterface
{
    public function __construct(protected Team $model){}

    public function getAll(string $filter = null): array
    {
        return $this->model
                    ->where(function($query) use ($filter) {
                        if ($filter) {
                            $query->where('name', 'like', "%{$filter}%");
                        }
                    })
                    ->get()
                    ->toArray();
    }
    public function findOne(string $id): stdClass | null
    {
        $team = $this->model->with('matches')->find($id);

        if(!$team) {
            return null;
        }

        return (object) $team->toArray();
    }
    public function new(CreateTeamDTO $dto): stdClass
    {
        return (object) $this->model
                            ->create((array) $dto)
                            ->toArray();
    }
    public function update(UpdateTeamDTO $dto): stdClass | null
    {
        if(!$team = $this->model->find($dto->id))
        {
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
