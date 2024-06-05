<?php

namespace App\DTO\Championship;

use App\DTO\DTOInterface;
use Illuminate\Http\Request;

class UpdateChampionshipDTO implements DTOInterface
{
    public function __construct(public string $name, public string $id){}

    public static function makeFromRequest(Request $request): self
    {
        return new self($request->get('name'), $request->get('id'));
    }
}
