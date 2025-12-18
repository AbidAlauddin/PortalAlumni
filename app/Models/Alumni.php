<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';
    
    protected $fillable = [
        'user_id',
        'fullname',
        'nim',
        'program_study',
        'faculty',
        'graduation_year',
        'phone',
        'address',
        'linkedin',
        'portfolio_url',
        'cv_path',
        'profile_photo',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matchingJobs()
    {
        return $this->hasMany(MatchingJob::class);
    }
}
