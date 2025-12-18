<?php

namespace App\Livewire\Companies\Lowongan;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $job;

    public function mount($id)
    {
        // Ambil data job berdasarkan ID dan pastikan milik perusahaan yang login
        // Gunakan withCount('applicants') untuk menghitung jumlah pelamar
        $this->job = Job::where('id', $id)
            ->where('user_id', Auth::user()->user_id)
            ->withCount('applicants') 
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.companies.lowongan.show')
            ->layout('layouts.dashboard');
    }
}