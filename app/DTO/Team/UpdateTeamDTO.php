<?php

namespace App\DTO\Team;

use App\DTO\DTOInterface;
use Illuminate\Http\Request;

class UpdateTeamDTO
{
    public function __construct(public string $name, public int $id){}

    public static function makeFromRequest(Request $request,  string $id): self
    {
        return new self($request->get('name'), $id);
    }


}
