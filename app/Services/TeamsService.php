<?php

namespace App\Services;

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

    public function new(string $name): stdClass
    {
        return $this->repository->create($name);
    }

    public function update(string $name, string $id): stdClass | null
    {
        return $this->repository->update($name, $id);
    }
}
