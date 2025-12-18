@extends('layouts.app')

@section('content')

{{-- ================= ALERT MESSAGE ================= --}}
@if(session('success'))
    <div style="position: fixed; top: 100px; right: 20px; z-index: 9999; background: #d1fae5; border-left: 4px solid #10b981; padding: 16px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); animation: slideIn 0.5s ease;">
        <p style="color: #065f46; font-weight: 600; margin: 0;">✅ {{ session('success') }}</p>
    </div>
@endif

@if(session('error'))
    <div style="position: fixed; top: 100px; right: 20px; z-index: 9999; background: #fee2e2; border-left: 4px solid #ef4444; padding: 16px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); animation: slideIn 0.5s ease;">
        <p style="color: #991b1b; font-weight: 600; margin: 0;">⚠️ {{ session('error') }}</p>
    </div>
@endif

{{-- ================= PAGE HEADER ================= --}}
<section class="page-header">
    <div class="page-header-content">
        <h1 class="page-title">Job Applications</h1>
        <p class="page-subtitle">Track your applications and discover new career opportunities</p>
    </div>
</section>

{{-- ================= SECTION 1: ACTIVE APPLICATIONS ================= --}}
<section class="continue-learning-section">
    <div class="learning-container">
        <h2 class="learning-section-title">Active Applications</h2>
        
        <div class="learning-grid">
            @forelse($activeApplications as $application)
                @php
                    // Logika Progress Bar & Badge
                    $progress = match($application->status) {
                        'applied' => 25,
                        'reviewed' => 50,
                        'interview' => 75,
                        'accepted' => 100,
                        'rejected' => 100,
                        default => 0,
                    };

                    $badgeText = match($application->status) {
                        'applied' => 'Applied 📋',
                        'reviewed' => 'Under Review 🧐',
                        'interview' => 'Interview Stage 💼',
                        'accepted' => 'Hired! 🎉',
                        'rejected' => 'Closed ❌',
                        default => 'Pending',
                    };
                @endphp

                <div class="learning-card">
                    <div class="learning-card-image">
                        <div class="materials-badge">{{ $badgeText }}</div>
                        {{-- Menggunakan optional chaining (?->) agar tidak error jika company null --}}
                        <img src="{{ $application->jobseek->company?->logo ? asset('storage/'.$application->jobseek->company->logo) : 'https://ui-avatars.com/api/?name='.urlencode($application->jobseek->company?->name ?? 'Company').'&background=random' }}" alt="Company Logo">
                    </div>
                    <div class="learning-card-content">
                        <div class="course-meta">
                            <span class="course-type">🏢 {{ $application->jobseek->job_type }}</span>
                        </div>
                        <h3 class="course-title">{{ $application->jobseek->title }}</h3>
                        
                        <div class="progress-wrapper">
                            <div class="progress-header">
                                <span class="progress-label">Progress:</span>
                                <span class="progress-value">{{ $progress }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $progress }}%; background: {{ $application->status == 'rejected' ? '#ef4444' : 'linear-gradient(90deg, #10b981 0%, #059669 100%)' }}"></div>
                            </div>
                        </div>
                        <div class="learning-footer">
                            <div class="next-step">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z" stroke-width="2"/>
                                    <path d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                <span>Applied on: <a href="#">{{ \Carbon\Carbon::parse($application->applied_at)->format('d M Y') }}</a></span>
                            </div>
                            <button class="continue-btn">View Details</button>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Tampilan Kosong --}}
                <div class="learning-card" style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                    <h3 class="course-title" style="margin-bottom: 10px;">No Active Applications</h3>
                    <p style="color: #6b7280;">You haven't applied to any jobs yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ================= SECTION 2: AVAILABLE POSITIONS ================= --}}
<section class="materials-section">
    <div class="materials-container">
        <div class="materials-header">
            <div class="materials-header-left">
                <h2 class="materials-title">Available Positions <span class="materials-count">{{ $availableJobs->total() }}</span></h2>
            </div>
            <div class="materials-header-right">
                {{-- Form Search --}}
                <form action="{{ route('jobseek') }}" method="GET" class="search-wrapper">
                    <svg class="search-icon-small" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search jobs..." class="materials-search">
                </form>
                <button class="filter-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 6h18M7 12h10M11 18h2" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Add Filter
                </button>
            </div>
        </div>

        {{-- Filter Links --}}
        <div class="status-filters">
            <a href="{{ route('jobseek') }}" class="status-filter {{ !request('type') ? 'active' : '' }}">All Jobs</a>
            <a href="{{ route('jobseek', ['type' => 'Full-time']) }}" class="status-filter {{ request('type') == 'Full-time' ? 'active' : '' }}">Full-time</a>
            <a href="{{ route('jobseek', ['type' => 'Part-time']) }}" class="status-filter {{ request('type') == 'Part-time' ? 'active' : '' }}">Part-time</a>
            <a href="{{ route('jobseek', ['type' => 'Internship']) }}" class="status-filter {{ request('type') == 'Internship' ? 'active' : '' }}">Internship</a>
        </div>

        {{-- Grid Lowongan --}}
        <div class="materials-grid">
            @forelse($availableJobs as $job)
                @php
                    // Random Style untuk Badge Warna-Warni
                    $styles = ['quiz', 'page', 'path', 'course'];
                    $randomStyle = $styles[array_rand($styles)];
                    
                    $minSalary = $job->salary_min / 1000000;
                    $maxSalary = $job->salary_max / 1000000;
                @endphp

                <div class="material-card">
                    <div class="material-image">
                        <div class="material-badge">{{ $job->job_type }} 💼</div>
                        <img src="{{ $job->company?->logo ? asset('storage/'.$job->company->logo) : 'https://ui-avatars.com/api/?name='.urlencode($job->company?->name ?? 'Company').'&background=random' }}" alt="Job Position">
                    </div>
                    <div class="material-content">
                        <div class="material-meta">
                            <span class="material-type {{ $randomStyle }}">💰 Rp {{ $minSalary }}-{{ $maxSalary }}jt/mo</span>
                            <span class="material-certified">• {{ $job->work_system }} 🌍</span>
                        </div>
                        <h3 class="material-title">{{ $job->title }}</h3>
                        <div class="material-tags">
                            <span class="material-tag">{{ $job->experience_level }}</span>
                            @if(\Carbon\Carbon::parse($job->created_at)->diffInDays() < 7)
                                <span class="material-tag urgent">New</span>
                            @endif
                        </div>
                        <div class="material-footer">
                            <div class="material-points">
                                <span class="points-icon">🏢</span>
                                <span class="points-text"><strong>{{ Str::limit($job->company?->name, 15) }}</strong></span>
                                <span class="points-detail">{{ Str::limit($job->location, 10) }}</span>
                            </div>
                            
                            {{-- BUTTON APPLY MEMANGGIL MODAL --}}
                            <button onclick="openApplyModal('{{ $job->id }}', '{{ $job->title }}', '{{ $job->company?->name }}')" class="material-btn view-btn">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500">No available jobs found matching your criteria.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($availableJobs->hasMorePages())
            <div class="load-more-wrapper">
                <a href="{{ $availableJobs->nextPageUrl() }}" class="load-more-btn">
                    Load More Jobs
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>

{{-- ================= MODAL POPUP ================= --}}
<div id="applyModal" class="modal-overlay" style="display: none;">
    <div class="modal-container">
        <div class="modal-header">
            <div>
                <h3 class="modal-title">Apply for Position</h3>
                <p id="modalJobTitle" class="modal-subtitle">Job Title</p>
                <p id="modalCompanyName" class="text-sm text-emerald-600 font-semibold"></p>
            </div>
            <button onclick="closeApplyModal()" class="modal-close">&times;</button>
        </div>
        
        <form action="{{ route('jobseek.apply') }}" method="POST" enctype="multipart/form-data" class="modal-body">
            @csrf
            {{-- Input Hidden ID --}}
            <input type="hidden" name="jobseek_id" id="modalJobId">

            {{-- Input CV --}}
            <div class="form-group">
                <label class="form-label">Upload CV (PDF/DOC) <span class="text-red-500">*</span></label>
                <div class="file-upload-wrapper">
                    <input type="file" name="cv_file" class="form-input-file" required accept=".pdf,.doc,.docx">
                    <p class="text-xs text-gray-500 mt-1">Max file size: 2MB</p>
                </div>
            </div>

            {{-- Input Portfolio --}}
            <div class="form-group">
                <label class="form-label">Portfolio Link (Optional)</label>
                <input type="url" name="portfolio_link" placeholder="https://linkedin.com/in/..." class="form-input">
            </div>

            {{-- Input Cover Letter --}}
            <div class="form-group">
                <label class="form-label">Cover Letter (Optional)</label>
                <textarea name="cover_letter" rows="4" placeholder="Tell us why you fit for this role..." class="form-textarea"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="closeApplyModal()" class="btn-cancel">Cancel</button>
                <button type="submit" class="btn-submit">Submit Application</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= JAVASCRIPT ================= --}}
<script>
    function openApplyModal(id, title, company) {
        document.getElementById('modalJobId').value = id;
        document.getElementById('modalJobTitle').innerText = title;
        document.getElementById('modalCompanyName').innerText = company;
        document.getElementById('applyModal').style.display = 'flex';
        document.body.style.overflow = 'hidden'; 
    }

    function closeApplyModal() {
        document.getElementById('applyModal').style.display = 'none';
        document.body.style.overflow = 'auto'; 
    }

    window.onclick = function(event) {
        const modal = document.getElementById('applyModal');
        if (event.target == modal) {
            closeApplyModal();
        }
    }
</script>

{{-- ================= CSS (DIGABUNG) ================= --}}
<style>
    /* 1. Modal Styles (Baru) */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        animation: fadeIn 0.3s ease;
    }

    .modal-container {
        background: white;
        width: 100%;
        max-width: 500px;
        border-radius: 20px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        overflow: hidden;
        animation: slideUp 0.3s ease;
    }

    .modal-header {
        padding: 20px 24px;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        background: #f9fafb;
    }

    .modal-title { font-size: 1.25rem; font-weight: 700; color: #1f2937; }
    .modal-subtitle { font-size: 0.9rem; color: #6b7280; margin-top: 4px; }
    .modal-close { background: none; border: none; font-size: 1.5rem; line-height: 1; color: #9ca3af; cursor: pointer; }
    .modal-close:hover { color: #ef4444; }
    
    .modal-body { padding: 24px; }
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-size: 0.9rem; font-weight: 600; color: #374151; margin-bottom: 8px; }
    
    .form-input, .form-textarea, .form-input-file {
        width: 100%; padding: 10px 12px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 0.95rem; outline: none; transition: border-color 0.2s;
    }
    .form-input:focus, .form-textarea:focus { border-color: #10b981; }
    
    .file-upload-wrapper { background: #f9fafb; padding: 16px; border: 2px dashed #e5e7eb; border-radius: 12px; text-align: center; }
    
    .modal-footer {
        padding: 20px 24px; background: #f9fafb; border-top: 1px solid #f3f4f6; display: flex; justify-content: flex-end; gap: 12px;
    }
    
    .btn-cancel { padding: 10px 20px; border-radius: 50px; border: 1px solid #d1d5db; background: white; color: #374151; font-weight: 600; cursor: pointer; }
    .btn-submit { padding: 10px 24px; border-radius: 50px; border: none; background: #10b981; color: white; font-weight: 600; cursor: pointer; }
    .btn-submit:hover { background: #059669; }

    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    @keyframes slideIn { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }

    /* 2. Original CSS (Dari file Anda) */
    .page-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        padding: 140px 20px 80px;
        margin-top: -100px;
        padding-top: 230px;
        position: relative;
    }
    .page-header::before {
        content: ''; position: absolute; inset: 0; background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></svg>'); opacity: 0.3;
    }
    .page-header-content { max-width: 1200px; margin: 0 auto; text-align: center; position: relative; z-index: 1; }
    .page-title { font-size: 3rem; font-weight: 800; color: white; margin-bottom: 16px; text-shadow: 0 2px 20px rgba(0, 0, 0, 0.1); }
    .page-subtitle { font-size: 1.25rem; color: rgba(255, 255, 255, 0.95); }

    .continue-learning-section { background: white; padding: 80px 20px; }
    .learning-container { max-width: 1400px; margin: 0 auto; }
    .learning-section-title { font-size: 2rem; font-weight: 700; color: #1f2937; margin-bottom: 40px; }
    .learning-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 32px; }
    
    .learning-card { background: white; border: 2px solid #f3f4f6; border-radius: 24px; overflow: hidden; transition: all 0.3s ease; }
    .learning-card:hover { border-color: #10b981; box-shadow: 0 20px 50px rgba(16, 185, 129, 0.15); transform: translateY(-5px); }
    .learning-card-image { position: relative; height: 200px; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); overflow: hidden; }
    .learning-card-image img { width: 100%; height: 100%; object-fit: cover; }
    
    .materials-badge { position: absolute; top: 16px; left: 16px; background: rgba(30, 41, 59, 0.9); backdrop-filter: blur(10px); color: white; padding: 8px 16px; border-radius: 12px; font-size: 0.875rem; font-weight: 600; }
    .learning-card-content { padding: 28px; }
    .course-meta { display: flex; align-items: center; gap: 8px; margin-bottom: 12px; }
    .course-type { color: #10b981; font-size: 0.9rem; font-weight: 600; }
    .course-title { font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 20px; line-height: 1.3; }
    
    .progress-wrapper { margin-bottom: 24px; }
    .progress-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
    .progress-label { font-size: 0.9rem; color: #6b7280; font-weight: 500; }
    .progress-value { font-size: 1rem; font-weight: 700; color: #10b981; }
    .progress-bar { height: 10px; background: #f3f4f6; border-radius: 10px; overflow: hidden; }
    .progress-fill { height: 100%; border-radius: 10px; transition: width 0.3s ease; }
    
    .learning-footer { display: flex; justify-content: space-between; align-items: center; gap: 20px; padding-top: 20px; border-top: 2px solid #f3f4f6; }
    .next-step { flex: 1; display: flex; align-items: flex-start; gap: 8px; color: #6b7280; font-size: 0.875rem; line-height: 1.5; }
    .next-step svg { flex-shrink: 0; margin-top: 2px; color: #10b981; }
    .next-step a { color: #10b981; font-weight: 600; text-decoration: none; transition: color 0.3s ease; }
    .next-step a:hover { color: #059669; }
    
    .continue-btn { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; font-weight: 600; padding: 12px 32px; border-radius: 50px; border: none; cursor: pointer; font-size: 0.95rem; transition: all 0.3s ease; white-space: nowrap; }
    .continue-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4); }

    .materials-section { background: #f9fafb; padding: 80px 20px; }
    .materials-container { max-width: 1400px; margin: 0 auto; }
    .materials-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; gap: 20px; flex-wrap: wrap; }
    .materials-title { font-size: 2rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; gap: 12px; }
    .materials-count { background: #f3f4f6; color: #6b7280; font-size: 1.25rem; padding: 4px 12px; border-radius: 12px; font-weight: 600; }
    .materials-header-right { display: flex; gap: 12px; align-items: center; }
    .search-wrapper { position: relative; display: flex; align-items: center; }
    .search-icon-small { position: absolute; left: 14px; color: #9ca3af; }
    .materials-search { padding: 10px 16px 10px 42px; border: 2px solid #e5e7eb; border-radius: 50px; font-size: 0.95rem; outline: none; transition: all 0.3s ease; width: 200px; }
    .materials-search:focus { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); }
    
    .filter-btn, .sort-btn { display: flex; align-items: center; gap: 8px; padding: 10px 20px; border: 2px solid #e5e7eb; border-radius: 50px; background: white; color: #1f2937; font-weight: 600; font-size: 0.95rem; cursor: pointer; transition: all 0.3s ease; }
    .filter-btn:hover, .sort-btn:hover { border-color: #10b981; color: #10b981; }
    
    .status-filters { display: flex; gap: 12px; margin-bottom: 40px; flex-wrap: wrap; }
    .status-filter { padding: 10px 24px; border: 2px solid #e5e7eb; border-radius: 50px; background: white; color: #6b7280; font-weight: 600; font-size: 0.95rem; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-block; }
    .status-filter:hover { border-color: #10b981; color: #10b981; }
    .status-filter.active { background: #10b981; border-color: #10b981; color: white; }
    
    .materials-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(380px, 1fr)); gap: 28px; }
    .material-card { background: white; border: 2px solid #f3f4f6; border-radius: 20px; overflow: hidden; transition: all 0.3s ease; }
    .material-card:hover { border-color: #10b981; box-shadow: 0 20px 50px rgba(16, 185, 129, 0.1); transform: translateY(-5px); }
    .material-image { position: relative; height: 180px; background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); overflow: hidden; }
    .material-image img { width: 100%; height: 100%; object-fit: cover; }
    .material-badge { position: absolute; top: 16px; left: 16px; background: rgba(30, 41, 59, 0.9); backdrop-filter: blur(10px); color: white; padding: 6px 14px; border-radius: 10px; font-size: 0.8rem; font-weight: 600; }
    .material-content { padding: 24px; }
    
    .material-meta { display: flex; align-items: center; gap: 4px; margin-bottom: 12px; flex-wrap: wrap; }
    .material-type { font-size: 0.875rem; font-weight: 600; color: #6b7280; }
    .material-type.quiz { color: #f59e0b; }
    .material-type.page { color: #3b82f6; }
    .material-type.path { color: #ec4899; }
    .material-type.course { color: #8b5cf6; }
    .material-certified { font-size: 0.8rem; color: #6b7280; }
    
    .material-title { font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 16px; line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .material-tags { display: flex; gap: 8px; margin-bottom: 20px; flex-wrap: wrap; }
    .material-tag { padding: 6px 12px; background: #f3f4f6; color: #6b7280; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
    .material-tag.urgent { background: #fef3c7; color: #92400e; }
    
    .material-footer { display: flex; justify-content: space-between; align-items: center; gap: 16px; padding-top: 20px; border-top: 2px solid #f3f4f6; }
    .material-points { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
    .points-icon { font-size: 1.25rem; }
    .points-text { font-size: 0.95rem; color: #6b7280; }
    .points-text strong { color: #10b981; font-size: 1.1rem; }
    .points-detail { font-size: 0.8rem; color: #9ca3af; }
    
    .material-btn { padding: 10px 24px; border-radius: 50px; border: none; font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease; white-space: nowrap; }
    .view-btn { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; }
    .view-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4); }
    
    .load-more-wrapper { text-align: center; margin-top: 50px; }
    .load-more-btn { display: inline-flex; align-items: center; gap: 8px; padding: 14px 40px; background: white; border: 2px solid #10b981; border-radius: 50px; color: #10b981; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; text-decoration: none; }
    .load-more-btn:hover { background: #10b981; color: white; transform: translateY(-2px); box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3); }

    /* RESPONSIVE */
    @media (max-width: 1200px) { .learning-grid { grid-template-columns: 1fr; } .materials-grid { grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); } }
    @media (max-width: 1024px) { 
        .page-title { font-size: 2.5rem; } 
        .materials-header { flex-direction: column; align-items: flex-start; } 
        .materials-header-right { width: 100%; flex-wrap: wrap; }
        .materials-search { flex: 1; min-width: 200px; }
    }
    @media (max-width: 768px) {
        .page-header { padding: 120px 20px 60px; }
        .page-title { font-size: 2rem; }
        .continue-learning-section, .materials-section { padding: 60px 20px; }
        .materials-grid { grid-template-columns: 1fr; gap: 24px; }
        .material-footer { flex-direction: column; align-items: stretch; gap: 12px; }
        .material-points { order: 1; }
        .material-btn { order: 2; width: 100%; justify-content: center; }
    }
</style>
@endsection