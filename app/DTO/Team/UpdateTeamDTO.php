<?php

namespace App\DTO\Team;

use App\DTO\DTOInterface;
use Illuminate\Http\Request;

class UpdateTeamDTO implements DTOInterface
{
    public function __construct(public string $name, public int $id){}

    public static function makeFromRequest(Request $request): self
    {
        return new self($request->get('name'), $request->get('id'));
    }


}
