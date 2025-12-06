<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'email',
        'phone',
        'website',
        'address',
        'description',
        'industry',
    ];

    public function jobseeks()
    {
        return $this->hasMany(Jobseek::class);
    }
}
