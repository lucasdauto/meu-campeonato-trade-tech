<?php

namespace App\Repositories\Championship;

use App\DTO\Championship\CreateChampionshipDTO;
use App\DTO\Championship\UpdateChampionshipDTO;
use stdClass;


interface ChampionshipRepositoryInterface
{
    public function getAll(string $filter): array;
    public function findOne(string $id): stdClass|null;
    public function new(CreateChampionshipDTO $dto): stdClass;
    public function update(UpdateChampionshipDTO $dto): stdClass | null;
    public function delete(string $id): bool;
}
