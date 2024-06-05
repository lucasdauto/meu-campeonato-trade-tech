<?php

namespace App\DTO\Championship;

use App\DTO\DTOInterface;
use Illuminate\Http\Request;

class UpdateChampionshipDTO
{
    public function __construct(public string $name, public string $id){}

    public static function makeFromRequest(Request $request, string | int $id): self
    {
        return new self($request->get('name'), $id);
    }
}
