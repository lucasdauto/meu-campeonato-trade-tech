<?php

namespace App\Repositories\Matches;

use App\DTO\Match\{CreateMatchDTO, UpdateMatchDTO};
use App\Models\Matches;
use App\Repositories\Matches\MatchesRepositoryInterface;
use App\Repositories\DefautEloquentORM;
use stdClass;

class MatchesEloquentORM implements MatchesRepositoryInterface
{
    public function __construct(protected Matches $model){}

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
        $matches = $this->model
                            ->find($id)
                            ->with(['teamA', 'teamB', 'Matches'])
                            ->get();

        if(!$matches) {
            return null;
        }

        return (object) $matches->toArray();
    }
    public function new(CreateMatchDTO $dto): stdClass
    {
        return (object) $this->model
                            ->create((array) $dto)
                            ->toArray();
    }
    public function update(UpdateMatchDTO $dto): stdClass | null
    {
        if(!$matches = $this->model->find($dto->id))
        {
            return null;
        }
        $matches->update((array) $dto);
        return (object) $matches->toArray();
    }
    public function delete(string $id): bool
    {
        $matches = $this->model->findOrFail($id);

        return $matches->delete();
    }
}
