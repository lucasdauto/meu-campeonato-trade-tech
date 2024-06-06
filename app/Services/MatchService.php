<?php


namespace App\Services;

use App\DTO\Match\{CreateMatchDTO, UpdateMatchDTO};
use App\Repositories\Matches\MatchesRepositoryInterface;
use stdClass;

class MatchService
{
    public function __construct(protected MatchesRepositoryInterface $repository){}

    public function getAll(string $filter = null)
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

    public function new(CreateMatchDTO $dto): stdClass | null
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateMatchDTO $dto): stdClass | null
    {
        return $this->repository->update($dto);
    }
}
