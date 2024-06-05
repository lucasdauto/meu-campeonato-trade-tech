<?php

namespace App\DTO\Team;

class CreateTeamDTO
{
    public function __construct(
        public string $name
    ) {}
}
