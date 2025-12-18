<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Jobseek;
use App\Models\JobVacancy;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

#[Layout('layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        $user = Auth::user();
        $userId = $user->id;
        $isAdmin = $user->role === 'admin'; // Cek apakah user adalah admin

        // --- 1. STATS CARDS ---
        
        // QUERY BUILDER HELPER
        // Jika Admin, ambil semua data. Jika Company, ambil data miliknya saja.
        $jobQuery = Jobseek::query();
        if (!$isAdmin) {
            $jobQuery->where('user_id', $userId);
        }

        // Hitung Lowongan
        $activeJobs = (clone $jobQuery)->where('status', 'open')->count();
        $closedJobs = (clone $jobQuery)->where('status', 'closed')->count();

        // Hitung Pelamar
        // Jika admin: hitung semua pelamar di tabel JobVacancy
        // Jika company: hitung pelamar yang melamar ke lowongan milik user ini
        $applicantQuery = JobVacancy::query();
        if (!$isAdmin) {
            $applicantQuery->whereHas('jobseek', function($q) use ($userId) {
                $q->where('user_id', $userId);
            });
        }

        $totalApplicants = (clone $applicantQuery)->count();
        $newApplicants = (clone $applicantQuery)->where('status', 'applied')->count();


        // --- 2. CHART: Aktivitas Pelamar (7 Hari Terakhir) ---
        $chartData = [];
        $chartLabels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartLabels[] = $date->format('d M');
            
            // Query harian
            $dailyQuery = (clone $applicantQuery); // Gunakan base query yang sama
            $count = $dailyQuery->whereDate('applied_at', $date->format('Y-m-d'))->count();
            
            $chartData[] = $count;
        }

        // --- 3. CHART: Lowongan Terpopuler (Top 5) ---
        $popularJobs = (clone $jobQuery)
            ->withCount('applications')
            ->orderByDesc('applications_count')
            ->take(5)
            ->get();
        
        $jobLabels = $popularJobs->pluck('title')->toArray();
        $jobData = $popularJobs->pluck('applications_count')->toArray();

        // --- 4. TABEL PELAMAR TERBARU ---
        $recentApplicants = (clone $applicantQuery)
            ->with(['alumni', 'jobseek'])
            ->latest('applied_at')
            ->take(5)
            ->get();

        return view('livewire.dashboard.index', [
            'activeJobs' => $activeJobs,
            'closedJobs' => $closedJobs,
            'totalApplicants' => $totalApplicants,
            'newApplicants' => $newApplicants,
            'recentApplicants' => $recentApplicants,
            'chartLabels' => json_encode($chartLabels),
            'chartData' => json_encode($chartData),
            'jobLabels' => json_encode($jobLabels),
            'jobData' => json_encode($jobData),
        ]);
    }
}