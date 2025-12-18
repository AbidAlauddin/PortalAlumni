<?php

namespace App\Livewire\Companies\Lowongan;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $jobId;
    public $title, $description, $requirements, $type, $location, $salary, $deadline, $status;

    public function mount($id)
    {
        // Cari job dan pastikan milik company yang login
        $job = Job::where('id', $id)->where('user_id', Auth::user()->user_id)->firstOrFail();

        $this->jobId = $job->id;
        $this->title = $job->title;
        $this->description = $job->description;
        $this->requirements = $job->requirements;
        $this->type = $job->type;
        $this->location = $job->location;
        $this->salary = $job->salary;
        $this->deadline = $job->deadline instanceof \Carbon\Carbon ? $job->deadline->format('Y-m-d') : $job->deadline;
        $this->status = $job->status;
    }

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'type' => 'required',
        'description' => 'required|min:10',
        'requirements' => 'required',
        'location' => 'required',
        'status' => 'required',
        'deadline' => 'required|date',
    ];

    public function update()
    {
        $this->validate();

        $job = Job::where('id', $this->jobId)->where('user_id', Auth::user()->user_id)->firstOrFail();

        $job->update([
            'title' => $this->title,
            'description' => $this->description,
            'requirements' => $this->requirements,
            'type' => $this->type,
            'location' => $this->location,
            'salary' => $this->salary,
            'deadline' => $this->deadline,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Lowongan berhasil diperbarui!');
        return redirect()->route('company.lowongan.index');
    }

    public function render()
    {
        return view('livewire.companies.lowongan.edit')->layout('layouts.dashboard');
    }
}