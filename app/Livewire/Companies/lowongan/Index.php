<?php

namespace App\Livewire\Companies\Lowongan;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Jobseek;
use Illuminate\Database\Eloquent\Builder;

#[Layout('layouts.dashboard')]
class Index extends Component
{
    use WithPagination;

    // 1. Properti untuk Search & Filter
    public $search = '';
    public $statusFilter = '';

    // 2. Reset halaman ke 1 saat mengetik search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // 3. (Opsional) Fungsi Delete jika diperlukan
    public function delete($id)
    {
        $job = Jobseek::find($id);
        if ($job) {
            $job->delete();
            session()->flash('message', 'Lowongan berhasil dihapus.');
        }
    }

    public function render()
    {
        $jobseeks = Jobseek::with('user')
            // Logika Filter Status
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            // Logika Search (Judul atau Lokasi)
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('location', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.companies.lowongan.index', [
            'jobseeks' => $jobseeks
        ]);
    }
}