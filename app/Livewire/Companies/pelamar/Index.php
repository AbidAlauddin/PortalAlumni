<?php

namespace App\Livewire\Companies\Pelamar;

use Livewire\Component;
use Livewire\Attributes\Layout; // <--- WAJIB DI-IMPORT
use Livewire\WithPagination;
use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Applicant;

// --- ATRIBUT LAYOUT DI SINI ---
#[Layout('layouts.dashboard')] 
class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $vacancy = JobVacancy::find($id);
        if ($vacancy) {
            $vacancy->delete();
            session()->flash('message', 'Data pelamar berhasil dihapus.');
        }
    }

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

    public function render()
    {
        $vacancies = JobVacancy::with(['jobseek', 'alumni'])
            ->when($this->statusFilter, fn($q) => $q->where('status', $this->statusFilter))
            ->when($this->search, fn($q) => 
                $q->whereHas('alumni', fn($b) => $b->where('name', 'like', '%'.$this->search.'%'))
                  ->orWhereHas('jobseek', fn($b) => $b->where('title', 'like', '%'.$this->search.'%'))
            )
            ->latest('applied_at')
            ->paginate(10);

        return view('livewire.companies.pelamar.index', [
            'vacancies' => $vacancies
        ]);
    }
}