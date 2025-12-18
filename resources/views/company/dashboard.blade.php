@extends('layouts.dashboard')

@section('title', 'Ringkasan')

@section('styles')
<style>
    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 24px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        padding: 24px;
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        transition: transform 0.3s ease;
    }

    .stat-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-card); }

    .stat-info h3 { font-size: 0.9rem; color: var(--text-sub); margin-bottom: 8px; font-weight: 500; }
    .stat-info .value { font-size: 2rem; font-weight: 800; color: var(--text-main); line-height: 1; }
    .stat-info .trend { font-size: 0.85rem; margin-top: 12px; display: inline-flex; align-items: center; gap: 4px; }
    .trend.up { color: #10b981; }
    .trend.neutral { color: #6b7280; }

    .stat-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        background: var(--secondary); color: var(--primary);
    }

    /* Charts Section */
    .charts-container {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-bottom: 30px;
    }

    .chart-card {
        background: white;
        padding: 24px;
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
    }
    .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    .card-title { font-size: 1.1rem; font-weight: 700; color: var(--text-main); }

    /* Recent Table */
    .recent-section {
        background: white;
        padding: 24px;
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
    }
    
    .table-container { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; }
    th { text-align: left; padding: 16px; color: var(--text-sub); font-weight: 600; font-size: 0.9rem; border-bottom: 1px solid #e5e7eb; }
    td { padding: 16px; color: var(--text-main); font-size: 0.95rem; border-bottom: 1px solid #f3f4f6; }
    
    .status-badge {
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
    }
    .status-new { background: #dbeafe; color: #1e40af; }
    .status-interview { background: #fef3c7; color: #92400e; }
    .status-rejected { background: #fee2e2; color: #991b1b; }
    
    .action-btn { color: var(--primary); font-weight: 600; font-size: 0.9rem; }

    @media (max-width: 1024px) {
        .charts-container { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-info">
            <h3>Lowongan Aktif</h3>
            <div class="value">12</div>
            <div class="trend neutral">
                <span>• 2 Lowongan Draft</span>
            </div>
        </div>
        <div class="stat-icon">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <h3>Total Pelamar</h3>
            <div class="value">845</div>
            <div class="trend up">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                <span>+12% bulan ini</span>
            </div>
        </div>
        <div class="stat-icon" style="background: #e0e7ff; color: #4f46e5;">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <h3>Lamaran Baru</h3>
            <div class="value">18</div>
            <div class="trend up" style="color: #059669;">
                <span>Perlu direview</span>
            </div>
        </div>
        <div class="stat-icon" style="background: #dbeafe; color: #2563eb;">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <h3>Lowongan Ditutup</h3>
            <div class="value">5</div>
            <div class="trend neutral">
                <span>Posisi Terisi</span>
            </div>
        </div>
        <div class="stat-icon" style="background: #fee2e2; color: #dc2626;">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
    </div>
</div>

<div class="charts-container">
    <div class="chart-card">
        <div class="card-header">
            <h2 class="card-title">Aktivitas Pelamar (30 Hari Terakhir)</h2>
            <select style="border: 1px solid #e5e7eb; padding: 6px; border-radius: 8px; outline: none;">
                <option>Mingguan</option>
                <option>Bulanan</option>
            </select>
        </div>
        <canvas id="applicantsChart" height="120"></canvas>
    </div>

    <div class="chart-card">
        <div class="card-header">
            <h2 class="card-title">Lowongan Terpopuler</h2>
        </div>
        <canvas id="jobsChart" height="250"></canvas>
    </div>
</div>

<div class="recent-section">
    <div class="card-header">
        <h2 class="card-title">Pelamar Terbaru</h2>
        <a href="#" class="action-btn">Lihat Semua →</a>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama Kandidat</th>
                    <th>Posisi Dilamar</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="display: flex; align-items: center; gap: 10px;">
                        <img src="{{ asset('images/avatar-1.jpg') }}" style="width: 32px; height: 32px; border-radius: 50%;" alt="">
                        <span style="font-weight: 500;">Budi Santoso</span>
                    </td>
                    <td>UI/UX Designer</td>
                    <td>14 Des 2025</td>
                    <td><span class="status-badge status-new">Pending</span></td>
                    <td><a href="#" class="action-btn">Review</a></td>
                </tr>
                <tr>
                    <td style="display: flex; align-items: center; gap: 10px;">
                        <img src="{{ asset('images/avatar-2.jpg') }}" style="width: 32px; height: 32px; border-radius: 50%;" alt="">
                        <span style="font-weight: 500;">Siti Aminah</span>
                    </td>
                    <td>Digital Marketing</td>
                    <td>13 Des 2025</td>
                    <td><span class="status-badge status-interview">Interview</span></td>
                    <td><a href="#" class="action-btn">Detail</a></td>
                </tr>
                <tr>
                    <td style="display: flex; align-items: center; gap: 10px;">
                        <img src="{{ asset('images/avatar-3.jpg') }}" style="width: 32px; height: 32px; border-radius: 50%;" alt="">
                        <span style="font-weight: 500;">Rizky Pratama</span>
                    </td>
                    <td>Frontend Dev</td>
                    <td>12 Des 2025</td>
                    <td><span class="status-badge status-rejected">Rejected</span></td>
                    <td><a href="#" class="action-btn">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // 1. Line Chart - Applicant Activity
    const ctxApp = document.getElementById('applicantsChart').getContext('2d');
    new Chart(ctxApp, {
        type: 'line',
        data: {
            labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            datasets: [{
                label: 'Jumlah Pelamar',
                data: [12, 19, 15, 25],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, grid: { borderDash: [5, 5] } }, x: { grid: { display: false } } }
        }
    });

    // 2. Bar Chart - Popular Jobs
    const ctxJobs = document.getElementById('jobsChart').getContext('2d');
    new Chart(ctxJobs, {
        type: 'bar',
        data: {
            labels: ['UI/UX', 'Frontend', 'Marketing', 'Data'],
            datasets: [{
                label: 'Views',
                data: [300, 450, 200, 150],
                backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#6366f1'],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { x: { grid: { display: false } }, y: { display: false } }
        }
    });
</script>

@endsection