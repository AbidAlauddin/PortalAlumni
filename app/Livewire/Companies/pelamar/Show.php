<?php

namespace App\Livewire\Companies\Pelamar;

use Livewire\Component;
use App\Models\Applicant;

class Show extends Component
{
    public $applicant;
    public $status;
    public $note;

    public function mount($id)
    {
        $this->applicant = Applicant::with(['user', 'job'])->findOrFail($id);
        $this->status = $this->applicant->status;
        $this->note = $this->applicant->note;
    }

    public function updateStatus()
    {
        $this->applicant->update([
            'status' => $this->status,
            'note' => $this->note
        ]);

        session()->flash('message', 'Status lamaran berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.companies.pelamar.show')->layout('layouts.dashboard');
    }
}