<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobseek extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'type',
        'location',
        'salary_min',
        'salary_max',
        'description',
        'requirement',
        'responsibilities',
        'category',
        'major_preference',
        'is_active',
        'deadline',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function matching()
    {
        return $this->hasMany(MatchingJob::class);
    }
}
