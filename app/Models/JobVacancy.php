<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    protected $table = 'job_vacancies';

    protected $fillable = [
        'jobseek_id',
        'alumni_id',
        'status',
        'cv_file',
        'portfolio_link',
        'cover_letter',
        'applied_at',
    ];

    // ENUM STATUS
    public const STATUS_APPLIED = 'applied';
    public const STATUS_REVIEWED = 'reviewed';
    public const STATUS_INTERVIEW = 'interview';
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_REJECTED = 'rejected';

    public static function statuses(): array
    {
        return [
            self::STATUS_APPLIED,
            self::STATUS_REVIEWED,
            self::STATUS_INTERVIEW,
            self::STATUS_ACCEPTED,
            self::STATUS_REJECTED,
        ];
    }

    // RELATION
    public function jobseek()
    {
        return $this->belongsTo(Jobseek::class);
    }

    public function alumni()
    {
        return $this->belongsTo(User::class, 'alumni_id');
    }
}
