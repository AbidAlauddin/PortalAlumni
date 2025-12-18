<?php

namespace App\Livewire\Companies;

use Livewire\Component;
use Livewire\WithFileUploads; // Wajib untuk upload file
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;

#[Layout('layouts.dashboard')]
class Profile extends Component
{
    use WithFileUploads;

    // Properti Data Perusahaan
    public $name;
    public $email;
    public $phone;
    public $website;
    public $industry;
    public $address;
    public $description;
    
    // Properti Logo
    public $logo; // Untuk input file baru
    public $existingLogo; // Untuk menyimpan path logo lama

    public function mount()
    {
        $user = Auth::user();
        
        // Cek apakah user sudah punya data company, jika belum buat baru (antisipasi)
        $company = Company::firstOrCreate(
            ['user_id' => $user->id],
            ['name' => $user->name, 'email' => $user->email]
        );

        // Isi properti form dengan data dari database
        $this->name = $company->name;
        $this->email = $company->email;
        $this->phone = $company->phone;
        $this->website = $company->website;
        $this->industry = $company->industry;
        $this->address = $company->address;
        $this->description = $company->description;
        $this->existingLogo = $company->logo;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'industry' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:1024', // Max 1MB
        ]);

        $user = Auth::user();
        $company = $user->company;

        // Logika Upload Logo Baru
        if ($this->logo) {
            // Hapus logo lama jika ada (opsional, agar hemat storage)
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            
            // Simpan logo baru
            $logoPath = $this->logo->store('company-logos', 'public');
            $company->logo = $logoPath;
        }

        // Update Data ke Database
        $company->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'industry' => $this->industry,
            'address' => $this->address,
            'description' => $this->description,
        ]);

        // Update juga nama User agar sinkron
        $user->update(['name' => $this->name]);

        // Refresh data logo view
        $this->existingLogo = $company->logo;
        $this->logo = null; // Reset input file

        session()->flash('message', 'Profil perusahaan berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.companies.profile');
    }
}