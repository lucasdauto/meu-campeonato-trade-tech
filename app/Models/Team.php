<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matches;

class Team extends Model
{
    use HasFactory;

     public function matches() {
        return $this->hasMany(Matches::class);
    }
}
