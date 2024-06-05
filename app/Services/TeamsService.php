<?php

namespace App\Services;

use App\DTO\Team\CreateTeamDTO;
use App\DTO\Team\UpdateTeamDTO;
use stdClass;

class TeamsService
{
    protected $repository;
    public function __construct()
    {
    }

    public function getAll(string $filter = null): array
    {

        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass | null
    {
        return $this->repository->findOne($id);
    }

    public function delete(string $id): bool | null
    {
       return $this->repository->delete($id);
    }

    public function new(CreateTeamDTO $dto): stdClass | null
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateTeamDTO $dto): stdClass | null
    {
        return $this->repository->update($dto);
    }
}
