<?php

namespace App\Livewire\Admin\Users;

use App\Models\User; // Pastikan Model User di-import
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at'; // Default sort berdasarkan tanggal buat
    public $sortDirection = 'desc'; // Default urutan terbaru

    // Reset pagination saat user mengetik di kolom search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Fungsi untuk mengubah urutan (Sort)
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        // Query User dengan Search dan Sort
        $users = User::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            // Opsional: Filter agar user hanya melihat role tertentu jika perlu
            // ->where('role', '!=', 'admin') 
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.users.index', [
            'users' => $users
        ]);
    }
}