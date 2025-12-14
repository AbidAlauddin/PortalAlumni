<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // <--- Pastikan ini ada!
        'name',
        'email',
        'phone',
        'website',
        'address',
        'description',
        'industry',
        'logo',
    ];

    // Relasi ke User (Opsional tapi disarankan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}