<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseek extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'job_type',
        'work_system',
        'salary_min',
        'salary_max',
        'experience_level',
        'education_level',
        'quota',
        'status',
        'deadline',
    ];

    // ENUM STATUS
    public const STATUS_OPEN = 'open';
    public const STATUS_CLOSED = 'closed';
    public const STATUS_EXPIRED = 'expired';

    public static function statuses(): array
    {
        return [
            self::STATUS_OPEN,
            self::STATUS_CLOSED,
            self::STATUS_EXPIRED,
        ];
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // --- BAGIAN INI YANG DIPERBAIKI ---
    public function company()
    {
        // Kita definisikan manual kuncinya agar Laravel menghubungkan via 'user_id'
        // Parameter 2 ('user_id'): Kolom foreign key di tabel ini (jobseeks)
        // Parameter 3 ('user_id'): Kolom pemilik di tabel target (companies)
        return $this->belongsTo(Company::class, 'user_id', 'user_id');
    }
    // ----------------------------------

    public function applications()
    {
        return $this->hasMany(JobVacancy::class);
    }
}