<?php

namespace App\DTO;

use Illuminate\Http\Request;

interface DTOInterface
{
    public static function makeFromRequest(Request $request): self;
}
