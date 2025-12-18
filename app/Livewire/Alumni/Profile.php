<?php

namespace App\Livewire\Alumni;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Alumni;

#[Layout('layouts.app')]
class Profile extends Component
{
    use WithFileUploads;

    // Properti Data
    public $fullname, $nim, $phone, $address;
    public $program_study, $faculty, $graduation_year;
    public $bio, $linkedin, $portfolio_url;
    
    // File Uploads
    public $photo, $existingPhoto;
    public $cv, $existingCv;

    // Untuk Progress Bar
    public $profileCompletion = 0;

    public function mount()
    {
        $user = Auth::user();
        
        // Ambil atau Buat Data Alumni
        $alumni = Alumni::firstOrCreate(
            ['user_id' => $user->id],
            ['fullname' => $user->name]
        );

        // Isi properti form
        $this->fullname = $alumni->fullname ?? $user->name;
        $this->nim = $alumni->nim;
        $this->phone = $alumni->phone;
        $this->address = $alumni->address;
        $this->program_study = $alumni->program_study;
        $this->faculty = $alumni->faculty;
        $this->graduation_year = $alumni->graduation_year;
        $this->bio = $alumni->bio;
        $this->linkedin = $alumni->linkedin;
        $this->portfolio_url = $alumni->portfolio_url;
        
        $this->existingPhoto = $alumni->profile_photo;
        $this->existingCv = $alumni->cv_file; // Pastikan nama kolom di DB 'cv_file'

        $this->calculateCompletion();
    }

    public function calculateCompletion()
    {
        // Hitung kelengkapan profil sederhana
        $fields = [
            $this->fullname, $this->nim, $this->phone, $this->address,
            $this->program_study, $this->faculty, $this->graduation_year,
            $this->existingPhoto, $this->existingCv
        ];
        
        $filled = count(array_filter($fields));
        $total = count($fields);
        $this->profileCompletion = round(($filled / $total) * 100);
    }

    public function update()
    {
        $this->validate([
            'fullname' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'phone' => 'nullable|string|max:20',
            'program_study' => 'required|string',
            'faculty' => 'required|string',
            'graduation_year' => 'required|numeric',
            'photo' => 'nullable|image|max:2048', 
            'cv' => 'nullable|mimes:pdf|max:5120',
            'linkedin' => 'nullable|url',
            'portfolio_url' => 'nullable|url',
        ]);

        $user = Auth::user();

        // === PERBAIKAN DI SINI ===
        // Jangan gunakan $user->alumni, tapi cari manual agar tidak NULL
        $alumni = Alumni::where('user_id', $user->id)->first();

        // Jika entah kenapa data tidak ada, buat baru
        if (!$alumni) {
            $alumni = Alumni::create([
                'user_id' => $user->id,
                'fullname' => $user->name
            ]);
        }
        // =========================

        // Upload Foto
        if ($this->photo) {
            if ($alumni->profile_photo) Storage::disk('public')->delete($alumni->profile_photo);
            $alumni->profile_photo = $this->photo->store('alumni-photos', 'public');
        }

        // Upload CV
        if ($this->cv) {
            if ($alumni->cv_file) Storage::disk('public')->delete($alumni->cv_file);
            $alumni->cv_file = $this->cv->store('alumni-cvs', 'public');
        }

        // Update Nama User Login
        if($user->name !== $this->fullname) {
            $user->update(['name' => $this->fullname]);
        }

        // Update Data Alumni
        $alumni->update([
            'fullname' => $this->fullname,
            'nim' => $this->nim,
            'phone' => $this->phone,
            'address' => $this->address,
            'program_study' => $this->program_study,
            'faculty' => $this->faculty,
            'graduation_year' => $this->graduation_year,
            'bio' => $this->bio,
            'linkedin' => $this->linkedin,
            'portfolio_url' => $this->portfolio_url,
        ]);

        $this->calculateCompletion();
        
        // Reset file input
        $this->photo = null;
        $this->cv = null;
        $this->existingPhoto = $alumni->profile_photo;
        $this->existingCv = $alumni->cv_file;

        session()->flash('success', 'Profil berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.alumni.profile');
    }
}