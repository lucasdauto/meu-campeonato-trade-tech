<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_a_id',
        'team_b_id',
        'team_a_score',
        'team_b_score',
        'championship_id',
    ];

    public function teamA() {
        return $this->belongsTo(Team::class, 'team_a_id');
    }
    public function teamB() {
        return $this->belongsTo(Team::class, 'team_b_id');
    }
    public function championship() {
        return $this->belongsTo(Championship::class);
    }
}
