<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchingJob extends Model
{
    protected $fillable = [
        'alumni_id',
        'jobseek_id',
        'score',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function jobseek()
    {
        return $this->belongsTo(Jobseek::class);
    }
}
