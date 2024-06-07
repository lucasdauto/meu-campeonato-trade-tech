<?php

namespace App\Repositories\Matches;

use App\DTO\Match\{CreateMatchDTO, UpdateMatchDTO};
use stdClass;


interface MatchesRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function new(CreateMatchDTO $dto): stdClass;
    public function update(UpdateMatchDTO $dto): stdClass | null;
    public function delete(string $id): bool;
}
