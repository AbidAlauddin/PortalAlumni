<?php

namespace App\Livewire\Companies\Pelamar;

use App\Models\Alumni;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $user_id;
    public $job_id;
    public $status = 'pending';
    public $note;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'job_id' => 'required|exists:jobs,id',
        'status' => 'required|in:pending,reviewed,accepted,rejected',
        'note' => 'nullable|string|max:1000',
    ];

    protected $messages = [
        'user_id.required' => 'Alumni harus dipilih.',
        'user_id.exists' => 'Alumni tidak valid.',
        'job_id.required' => 'Lowongan harus dipilih.',
        'job_id.exists' => 'Lowongan tidak valid.',
        'status.required' => 'Status harus dipilih.',
        'status.in' => 'Status tidak valid.',
        'note.max' => 'Catatan maksimal 1000 karakter.',
    ];

    public function store()
    {
        $this->validate();

        // Check if applicant already exists for this user and job
        $existingApplicant = Applicant::where('user_id', $this->user_id)
            ->where('job_id', $this->job_id)
            ->first();

        if ($existingApplicant) {
            session()->flash('error', 'Pelamar sudah ada untuk lowongan ini.');
            return;
        }

        Applicant::create([
            'user_id' => $this->user_id,
            'job_id' => $this->job_id,
            'status' => $this->status,
            'note' => $this->note,
        ]);

        session()->flash('message', 'Pelamar berhasil ditambahkan.');

        return redirect()->route('company.applicants.index');
    }

    public function render()
    {
        $alumni = Alumni::with('user')->get();
        $jobs = Job::where('user_id', Auth::user()->company->user_id ?? Auth::id())->get();

        return view('livewire.companies.pelamar.create', [
            'alumni' => $alumni,
            'jobs' => $jobs,
        ]);
    }
}
