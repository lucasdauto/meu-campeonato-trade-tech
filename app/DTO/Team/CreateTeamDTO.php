<?php

namespace App\DTO\Team;

use App\DTO\DTOInterface;
use Illuminate\Http\Request;

class CreateTeamDTO implements DTOInterface
{
    public function __construct(
        public string $name
    ) {}

    public static function makeFromRequest(Request $request): self
    {
        return new self($request->get('name'));
    }
}
