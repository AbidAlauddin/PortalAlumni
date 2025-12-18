<?php

namespace App\Livewire\Companies\Lowongan;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    // Properti sesuai dengan wire:model di form
    public $title;
    public $description;
    public $requirements;
    public $type = 'Full-time'; // Default
    public $location;
    public $salary;
    public $deadline;
    public $status = 'draft'; // Default

    // Rules Validasi
    // App/Livewire/Companies/Lowongan/Create.php

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'type' => 'required|in:Full-time,Part-time,Internship,Contract',
        'location' => 'required|string',
        'salary' => 'nullable|string',
        'description' => 'required|min:10',
        'requirements' => 'nullable|string',
        'status' => 'required|in:draft,published,closed',
        // UBAH DARI 'after:today' KE 'after_or_equal:today' AGAR BISA PILIH HARI INI
        'deadline' => 'required|date|after_or_equal:today', 
    ];

    protected $messages = [
        'title.required' => 'Judul posisi wajib diisi.',
        'location.required' => 'Lokasi kantor wajib dipilih.',
        'description.required' => 'Deskripsi pekerjaan wajib diisi.',
        'deadline.required' => 'Batas lamaran wajib diisi.',
        'deadline.after_or_equal' => 'Tanggal batas lamaran minimal hari ini.', // Update pesan
    ];

    public function store()
    {
        // 1. Jalankan Validasi
        $this->validate();

        // 2. Simpan ke Database
        // Pastikan Model Job sudah menggunakan tabel 'job_vacancies' (bukan 'jobs')
        Job::create([
            'user_id' => Auth::id(), // Pastikan kolom di DB bernama 'user_id'
            'title' => $this->title,
            'description' => $this->description,
            'requirements' => $this->requirements,
            'type' => $this->type,
            'location' => $this->location,
            'salary' => $this->salary,
            'deadline' => $this->deadline,
            'status' => $this->status,
        ]);

        // 3. Notifikasi dan Redirect
        session()->flash('message', 'Lowongan berhasil dibuat!');
        
        // Pastikan route ini ada di web.php Anda
        return redirect()->route('company.lowongan.index');
    }

    public function render()
    {
        // Pastikan path view sesuai folder: resources/views/livewire/companies/lowongan/create.blade.php
        return view('livewire.companies.lowongan.create')
            ->layout('layouts.dashboard');
    }
}