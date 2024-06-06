<?php

namespace App\Services;

use App\DTO\Team\CreateTeamDTO;
use App\DTO\Team\UpdateTeamDTO;
use App\Repositories\Team\TeamRepositoryInterface;
use stdClass;

class TeamsService
{
    public function __construct(protected TeamRepositoryInterface $repository) {}

    public function getAll(string $filter = null): array
    {

        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass | null
    {
        return $this->repository->findOne($id);
    }

    public function delete(string $id): bool
    {
       return $this->repository->delete($id);
    }

    public function new(CreateTeamDTO $dto): stdClass | null
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateTeamDTO $dto): stdClass | null
    {
        return $this->repository->update($dto);
    }
}
