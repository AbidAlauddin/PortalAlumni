<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobseek;
use App\Models\JobVacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // 1. Ambil Lamaran Aktif User (Active Applications)
        // Asumsi: User sudah login dan memiliki relasi ke tabel job_vacancies via alumni atau user_id
        // Sesuaikan 'alumni' dengan relasi di model User Anda
        $activeApplications = [];
        if($user->alumni) {
            $activeApplications = JobVacancy::with(['jobseek.company'])
                ->where('alumni_id', $user->alumni->id)
                ->latest()
                ->take(2) // Mengambil 2 terbaru untuk tampilan atas
                ->get();
        }

        // 2. Ambil Semua Lowongan Tersedia (Available Positions)
        $query = Jobseek::with('company')->where('status', 'open');

        // Fitur Search Sederhana
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhereHas('company', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        }

        // Filter Status (Opsional, jika ada request filter)
        if ($request->has('type')) {
            $query->where('job_type', $request->type);
        }

        $availableJobs = $query->latest()->paginate(9); // Tampilkan 9 lowongan per halaman

        return view('alumni.jobseek', [
            'activeApplications' => $activeApplications,
            'availableJobs' => $availableJobs
        ]);
    }
    public function apply(Request $request)
    {
        $user = Auth::user();
        
        // Cek apakah user memiliki data alumni (karena tabel job_vacancies butuh alumni_id)
        if (!$user->alumni) {
            return back()->with('error', 'Anda harus melengkapi profil alumni terlebih dahulu.');
        }

        // Validasi Input
        $validator = Validator::make($request->all(), [
            'jobseek_id' => 'required|exists:jobseeks,id',
            'cv_file' => 'required|mimes:pdf,doc,docx|max:2048', // Max 2MB
            'portfolio_link' => 'nullable|url',
            'cover_letter' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Gagal melamar. Periksa inputan Anda.');
        }

        // Cek apakah sudah pernah melamar di lowongan ini
        $exists = JobVacancy::where('alumni_id', $user->alumni->id)
            ->where('jobseek_id', $request->jobseek_id)
            ->first();

        if ($exists) {
            return back()->with('error', 'Anda sudah melamar posisi ini sebelumnya.');
        }

        // Upload CV
        $cvPath = null;
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->store('cv_uploads', 'public');
        }

        // Simpan ke Database
        JobVacancy::create([
            'jobseek_id' => $request->jobseek_id,
            'alumni_id' => $user->alumni->id,
            'status' => 'applied', // Default status
            'cv_file' => $cvPath,
            'portfolio_link' => $request->portfolio_link,
            'cover_letter' => $request->cover_letter,
            'applied_at' => now(),
        ]);

        return back()->with('success', 'Lamaran berhasil dikirim! Ditunggu konfirmasi oleh perusahaan.');
    }
}