<?php

namespace App\Services;

use App\DTO\Championship\CreateChampionshipDTO;
use App\DTO\Championship\UpdateChampionshipDTO;
use App\Repositories\Championship\ChampionshipRepositoryInterface;
use stdClass;

class ChampionshipService

{

    public function __construct(protected ChampionshipRepositoryInterface $repository) {}


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

    public function new(CreateChampionshipDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateChampionshipDTO $dto): stdClass
    {
        return $this->repository->update($dto);
    }

    public function simulate():void
    {

        $this->repository->simulate();
    }

}
