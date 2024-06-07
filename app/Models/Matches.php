<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $fillable = [
        'team1_id',
        'team2_id',
        'score_team1',
        'score_team2',
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
