<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Applicant; // Menggunakan Model Applicant
use Illuminate\Support\Facades\Auth;

class Applicants extends Component
{
    use WithPagination;

    // Properti untuk Search dan Filter
    public $search = '';
    public $statusFilter = '';

    // Reset halaman ke 1 saat search/filter berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    // ▼▼▼ INI FUNGSI YANG HILANG (UPDATE STATUS) ▼▼▼
    public function updateStatus($id, $status)
    {
        // Cari data di tabel applicants berdasarkan ID
        $applicant = Applicant::find($id);

        if ($applicant) {
            // Validasi input status agar aman
            $validStatuses = ['applied', 'reviewed', 'interview', 'accepted', 'rejected'];
            
            if (in_array($status, $validStatuses)) {
                $applicant->update([
                    'status' => $status
                ]);

                // Kirim notifikasi sukses
                // Asumsi: Applicant punya relasi ke User (pelamar)
                $name = $applicant->user ? $applicant->user->name : 'Pelamar';
                
                session()->flash('message', "Status {$name} berhasil diubah menjadi " . ucfirst($status));
            }
        }
    }
    // ▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

    // Fungsi Hapus Data
    public function delete($id)
    {
        $applicant = Applicant::find($id);

        if ($applicant) {
            $applicant->delete();
            session()->flash('message', 'Data pelamar berhasil dihapus.');
        }
    }

    public function render()
    {
        $user = Auth::user();
        
        // Query Dasar
        $query = Applicant::with(['user', 'job']) // Load relasi user & job biar ringan
            ->latest();

        // 1. Filter Lowongan Milik Perusahaan Ini Saja
        if ($user->role === 'company' && $user->company) {
            // Asumsi: Applicant terhubung ke Job, dan Job terhubung ke Company
            $query->whereHas('job', function($q) use ($user) {
                $q->where('company_id', $user->company->id);
            });
        }

        // 2. Filter Status (Dropdown)
        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        // 3. Search (Pencarian Nama Pelamar / Judul Job)
        if ($this->search) {
            $query->where(function($q) {
                // Cari nama pelamar di tabel users
                $q->whereHas('user', function($subQ) {
                    $subQ->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                // Atau cari judul pekerjaan
                ->orWhereHas('job', function($subQ) {
                    $subQ->where('title', 'like', '%' . $this->search . '%');
                });
            });
        }

        // Return View dengan variabel 'vacancies' (sesuai view blade Anda)
        return view('livewire.company.applicants', [
            'vacancies' => $query->paginate(10)
        ]);
    }
}