<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobVacancy;

class Applicant extends Model
{
    protected $table = 'job_vacancies';
    protected $fillable = [
        'user_id',
        'job_id',
        'status',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function updateStatus($id, $status)
    {
        // Cari data lowongan berdasarkan ID
        $vacancy = JobVacancy::find($id);

        if ($vacancy) {
            // Validasi status agar aman (opsional tapi disarankan)
            $validStatuses = ['applied', 'reviewed', 'interview', 'accepted', 'rejected'];
            
            if (in_array($status, $validStatuses)) {
                $vacancy->update([
                    'status' => $status
                ]);

                session()->flash('message', "Status pelamar {$vacancy->alumni->name} berhasil diperbarui menjadi " . ucfirst($status));
            }
        }
    }
}
