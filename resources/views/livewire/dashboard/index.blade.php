<div>
    {{-- Inline CSS khusus halaman ini --}}
    <style>
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px; margin-bottom: 30px; }
        .stat-card { background: white; padding: 24px; border-radius: 16px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); display: flex; align-items: flex-start; justify-content: space-between; transition: transform 0.3s ease; border: 1px solid #f3f4f6; }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .stat-info h3 { font-size: 0.9rem; color: #6b7280; margin-bottom: 8px; font-weight: 500; }
        .stat-info .value { font-size: 2rem; font-weight: 800; color: #1f2937; line-height: 1; }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; }
        
        .charts-container { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 30px; }
        .chart-card { background: white; padding: 24px; border-radius: 16px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); border: 1px solid #f3f4f6; }
        
        .recent-section { background: white; padding: 24px; border-radius: 16px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); border: 1px solid #f3f4f6; }
        .status-badge { padding: 4px 10px; border-radius: 50px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        
        @media (max-width: 1024px) { .charts-container { grid-template-columns: 1fr; } }
    </style>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Ringkasan</h1>
        <p class="text-gray-500 text-sm">Selamat datang kembali, berikut statistik perusahaan Anda hari ini.</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <h3>Lowongan Aktif</h3>
                <div class="value">{{ $activeJobs }}</div>
                <div class="mt-2 text-xs text-emerald-600 flex items-center gap-1 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Sedang tayang
                </div>
            </div>
            <div class="stat-icon bg-emerald-50 text-emerald-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>Total Pelamar</h3>
                <div class="value">{{ $totalApplicants }}</div>
                <div class="mt-2 text-xs text-gray-500">Semua periode</div>
            </div>
            <div class="stat-icon bg-indigo-50 text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>Lamaran Baru</h3>
                <div class="value">{{ $newApplicants }}</div>
                <div class="mt-2 text-xs text-blue-600 font-medium">Perlu direview segera</div>
            </div>
            <div class="stat-icon bg-blue-50 text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>Lowongan Ditutup</h3>
                <div class="value">{{ $closedJobs }}</div>
                <div class="mt-2 text-xs text-gray-500">Posisi Terisi / Expired</div>
            </div>
            <div class="stat-icon bg-red-50 text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <div class="charts-container">
        <div class="chart-card">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800">Aktivitas Pelamar (7 Hari Terakhir)</h2>
            </div>
            <div class="relative h-64">
                <canvas id="applicantsChart"></canvas>
            </div>
        </div>

        <div class="chart-card">
            <div class="mb-4">
                <h2 class="text-lg font-bold text-gray-800">Lowongan Terpopuler</h2>
            </div>
            <div class="relative h-64">
                <canvas id="jobsChart"></canvas>
            </div>
        </div>
    </div>

    <div class="recent-section">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-bold text-gray-800">Pelamar Terbaru</h2>
            {{-- PERBAIKAN: Menggunakan route 'company.applicants.index' --}}
            <a href="{{ route('company.applicants.index') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-700">Lihat Semua →</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="pb-3 text-xs font-semibold text-gray-500 uppercase">Nama Kandidat</th>
                        <th class="pb-3 text-xs font-semibold text-gray-500 uppercase">Posisi Dilamar</th>
                        <th class="pb-3 text-xs font-semibold text-gray-500 uppercase">Tanggal</th>
                        <th class="pb-3 text-xs font-semibold text-gray-500 uppercase">Status</th>
                        <th class="pb-3 text-right text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($recentApplicants as $applicant)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="py-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $applicant->alumni && $applicant->alumni->profile_photo ? asset('storage/'.$applicant->alumni->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($applicant->alumni->name ?? 'User').'&background=10b981&color=fff' }}" 
                                     class="w-8 h-8 rounded-full object-cover border border-gray-200" alt="">
                                <div class="font-medium text-gray-900">{{ $applicant->alumni->name ?? 'User Terhapus' }}</div>
                            </div>
                        </td>
                        <td class="py-4 text-gray-600">{{ $applicant->jobseek->title ?? 'N/A' }}</td>
                        <td class="py-4 text-gray-500">{{ \Carbon\Carbon::parse($applicant->applied_at)->format('d M Y') }}</td>
                        <td class="py-4">
                            @php
                                $statusClass = match($applicant->status) {
                                    'applied' => 'bg-blue-100 text-blue-800',
                                    'reviewed' => 'bg-yellow-100 text-yellow-800',
                                    'interview' => 'bg-purple-100 text-purple-800',
                                    'accepted' => 'bg-emerald-100 text-emerald-800',
                                    'rejected' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800'
                                };
                            @endphp
                            <span class="status-badge {{ $statusClass }}">
                                {{ ucfirst($applicant->status) }}
                            </span>
                        </td>
                        <td class="py-4 text-right">
                            <a href="#" class="text-emerald-600 font-semibold hover:underline text-xs">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-500">Belum ada pelamar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- SCRIPT CHART JS --}}
@script
<script>
    const labels = {!! $chartLabels !!};
    const dataApplicants = {!! $chartData !!};
    const jobLabels = {!! $jobLabels !!};
    const jobData = {!! $jobData !!};

    new Chart(document.getElementById('applicantsChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pelamar',
                data: dataApplicants,
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { borderDash: [5, 5] } }, x: { grid: { display: false } } } }
    });

    new Chart(document.getElementById('jobsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: jobLabels,
            datasets: [{
                label: 'Pelamar',
                data: jobData,
                backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#6366f1', '#ec4899'],
                borderRadius: 4
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, indexAxis: 'y', plugins: { legend: { display: false } }, scales: { x: { grid: { borderDash: [5, 5] } }, y: { grid: { display: false } } } }
    });
</script>
@endscript
</div>