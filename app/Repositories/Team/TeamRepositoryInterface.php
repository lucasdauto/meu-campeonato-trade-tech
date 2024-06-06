<?php

namespace App\Repositories\Team;

use App\DTO\Team\{CreateTeamDTO, UpdateTeamDTO};
use stdClass;

interface TeamRepositoryInterface
{
    public function getAll(string $filter): array;
    public function findOne(string $id): stdClass|null;
    public function new(CreateTeamDTO $dto): stdClass;
    public function update(UpdateTeamDTO $dto): stdClass | null;
    public function delete(string $id): bool;
}
