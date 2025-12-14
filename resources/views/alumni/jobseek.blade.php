@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="page-header-content">
        <h1 class="page-title">Job Applications</h1>
        <p class="page-subtitle">Track your applications and discover new career opportunities</p>
    </div>
</section>

<section class="continue-learning-section">
    <div class="learning-container">
        <h2 class="learning-section-title">Active Applications</h2>
        
        <div class="learning-grid">
            <div class="learning-card">
                <div class="learning-card-image">
                    <div class="materials-badge">Interview Stage 💼</div>
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Tech Company">
                </div>
                <div class="learning-card-content">
                    <div class="course-meta">
                        <span class="course-type">🏢 Full-time</span>
                    </div>
                    <h3 class="course-title">Senior UI/UX Designer at TechCorp Indonesia</h3>
                    <div class="progress-wrapper">
                        <div class="progress-header">
                            <span class="progress-label">Application Progress:</span>
                            <span class="progress-value">75%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="learning-footer">
                        <div class="next-step">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z" stroke-width="2"/>
                                <path d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <span>Next: <a href="#">Final Interview scheduled for Dec 18, 2025 →</a></span>
                        </div>
                        <button class="continue-btn">View Details</button>
                    </div>
                </div>
            </div>

            <div class="learning-card">
                <div class="learning-card-image">
                    <div class="materials-badge">Under Review 📋</div>
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1632&q=80" alt="Startup Company">
                </div>
                <div class="learning-card-content">
                    <div class="course-meta">
                        <span class="course-type">🚀 Full-time</span>
                    </div>
                    <h3 class="course-title">Product Designer at Innovative Startup Labs</h3>
                    <div class="progress-wrapper">
                        <div class="progress-header">
                            <span class="progress-label">Application Progress:</span>
                            <span class="progress-value">50%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 50%"></div>
                        </div>
                    </div>
                    <div class="learning-footer">
                        <div class="next-step">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z" stroke-width="2"/>
                                <path d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <span>Waiting for HR response. Applied on <a href="#">Dec 10, 2025 →</a></span>
                        </div>
                        <button class="continue-btn">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="materials-section">
    <div class="materials-container">
        <div class="materials-header">
            <div class="materials-header-left">
                <h2 class="materials-title">Available Positions <span class="materials-count">42</span></h2>
            </div>
            <div class="materials-header-right">
                <div class="search-wrapper">
                    <svg class="search-icon-small" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <input type="text" placeholder="Search jobs..." class="materials-search">
                </div>
                <button class="filter-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 6h18M7 12h10M11 18h2" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Add Filter
                </button>
                <button class="sort-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 4h13M3 8h9M3 12h13M3 16h9M3 20h13M17 8l3-3 3 3M20 5v14" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Sort by
                </button>
            </div>
        </div>

        <div class="status-filters">
            <button class="status-filter active">All Jobs</button>
            <button class="status-filter">Applied</button>
            <button class="status-filter">Saved</button>
            <button class="status-filter">Interviewing</button>
            <button class="status-filter">Rejected</button>
        </div>

        <div class="materials-grid">
            <div class="material-card">
                <div class="material-image">
                    <div class="material-badge">Full-time 💼</div>
                    <img src="https://cdn.prod.website-files.com/6100d0111a4ed76bc1b9fd54/64664e9cd07202af8bcdc5e4_5757453.jpg" alt="Job Position">
                </div>
                <div class="material-content">
                    <div class="material-meta">
                        <span class="material-type quiz">💰 Rp 15-20M/year</span>
                        <span class="material-certified">• Remote 🌍</span>
                    </div>
                    <h3 class="material-title">Lead UI/UX Designer - E-commerce Platform</h3>
                    <div class="material-tags">
                        <span class="material-tag">UI/UX Design</span>
                        <span class="material-tag urgent">New</span>
                    </div>
                    <div class="material-footer">
                        <div class="material-points">
                            <span class="points-icon">🏢</span>
                            <span class="points-text"><strong>Tokopedia</strong></span>
                            <span class="points-detail">Jakarta, Indonesia</span>
                        </div>
                        <button class="material-btn view-btn">Apply Now</button>
                    </div>
                </div>
            </div>

            <div class="material-card">
                <div class="material-image">
                    <div class="material-badge">Full-time 💼</div>
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Job Position">
                </div>
                <div class="material-content">
                    <div class="material-meta">
                        <span class="material-type page">💰 Rp 12-18M/year</span>
                    </div>
                    <h3 class="material-title">Senior Product Designer - FinTech Solutions</h3>
                    <div class="material-tags">
                        <span class="material-tag">Product Design</span>
                        <span class="material-tag">FinTech</span>
                    </div>
                    <div class="material-footer">
                        <div class="material-progress">
                            <span class="progress-label">Match Score:</span>
                            <div class="progress-bar-small">
                                <div class="progress-fill-small" style="width: 85%"></div>
                            </div>
                            <span class="progress-percent">85%</span>
                        </div>
                        <button class="material-btn continue-small-btn">Apply</button>
                    </div>
                </div>
            </div>

            <div class="material-card">
                <div class="material-image">
                    <div class="material-badge">Contract 📝</div>
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Job Position">
                </div>
                <div class="material-content">
                    <div class="material-meta">
                        <span class="material-type path">💰 Rp 10-15M/year</span>
                    </div>
                    <h3 class="material-title">UX Researcher - Healthcare Application</h3>
                    <div class="material-tags">
                        <span class="material-tag">UX Research</span>
                        <span class="material-tag">Healthcare</span>
                    </div>
                    <div class="material-footer">
                        <div class="material-status">
                            <span class="status-text">Saved</span>
                        </div>
                        <button class="material-btn start-btn">View Details</button>
                    </div>
                </div>
            </div>

            <div class="material-card">
                <div class="material-image">
                    <div class="material-badge">Full-time 💼</div>
                    <img src="https://images.unsplash.com/photo-1509343256512-d77a5cb3791b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Job Position">
                </div>
                <div class="material-content">
                    <div class="material-meta">
                        <span class="material-type course">💰 Rp 18-25M/year</span>
                    </div>
                    <h3 class="material-title">Design System Lead - Tech Giant</h3>
                    <div class="material-tags">
                        <span class="material-tag">Design Systems</span>
                        <span class="material-tag">Leadership</span>
                    </div>
                    <div class="material-footer">
                        <div class="material-progress">
                            <span class="progress-label">Match Score:</span>
                            <div class="progress-bar-small">
                                <div class="progress-fill-small" style="width: 92%"></div>
                            </div>
                            <span class="progress-percent">92%</span>
                        </div>
                        <button class="material-btn continue-small-btn">Apply</button>
                    </div>
                </div>
            </div>

            <div class="material-card">
                <div class="material-image">
                    <div class="material-badge">Part-time ⏰</div>
                    <img src="https://www.ied.edu/_default_upload_bucket/31608/image-thumb__31608__scaleByWidth1000/profession-visual-designer.jpg" alt="Job Position">
                </div>
                <div class="material-content">
                    <div class="material-meta">
                        <span class="material-type page">💰 Rp 8-12M/year</span>
                    </div>
                    <h3 class="material-title">Visual Designer - Creative Agency</h3>
                    <div class="material-tags">
                        <span class="material-tag">Visual Design</span>
                        <span class="material-tag">Flexible Hours</span>
                    </div>
                    <div class="material-footer">
                        <div class="material-progress">
                            <span class="progress-label">Match Score:</span>
                            <div class="progress-bar-small">
                                <div class="progress-fill-small" style="width: 78%"></div>
                            </div>
                            <span class="progress-percent">78%</span>
                        </div>
                        <button class="material-btn continue-small-btn">Apply</button>
                    </div>
                </div>
            </div>

            <div class="material-card">
                <div class="material-image">
                    <div class="material-badge">Full-time 💼</div>
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Job Position">
                </div>
                <div class="material-content">
                    <div class="material-meta">
                        <span class="material-type quiz">💰 Rp 14-20M/year</span>
                        <span class="material-score">• Hybrid 🏠</span>
                    </div>
                    <h3 class="material-title">Interaction Designer - Gaming Company</h3>
                    <div class="material-tags">
                        <span class="material-tag">Interaction Design</span>
                        <span class="material-tag urgent">Hot Job</span>
                    </div>
                    <div class="material-footer">
                        <div class="material-points">
                            <span class="points-icon">🎮</span>
                            <span class="points-text"><strong>Garena</strong></span>
                            <span class="points-detail">Bandung, Indonesia</span>
                        </div>
                        <button class="material-btn view-btn">Apply</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="load-more-wrapper">
            <button class="load-more-btn">
                Load More Jobs
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>
</section>

<style>
    /* PAGE HEADER */
    .page-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        padding: 140px 20px 80px;
        margin-top: -100px;
        padding-top: 230px;
        position: relative;
    }

    .page-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></svg>');
        opacity: 0.3;
    }

    .page-header-content {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .page-title {
        font-size: 3rem;
        font-weight: 800;
        color: white;
        margin-bottom: 16px;
        text-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    .page-subtitle {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.95);
    }

    /* CONTINUE LEARNING SECTION */
    .continue-learning-section {
        background: white;
        padding: 80px 20px;
    }

    .learning-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .learning-section-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 40px;
    }

    .learning-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
        gap: 32px;
    }

    .learning-card {
        background: white;
        border: 2px solid #f3f4f6;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .learning-card:hover {
        border-color: #10b981;
        box-shadow: 0 20px 50px rgba(16, 185, 129, 0.15);
        transform: translateY(-5px);
    }

    .learning-card-image {
        position: relative;
        height: 200px;
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        overflow: hidden;
    }

    .learning-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .materials-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: rgba(30, 41, 59, 0.9);
        backdrop-filter: blur(10px);
        color: white;
        padding: 8px 16px;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .learning-card-content {
        padding: 28px;
    }

    .course-meta {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
    }

    .course-type {
        color: #10b981;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .course-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 20px;
        line-height: 1.3;
    }

    .progress-wrapper {
        margin-bottom: 24px;
    }

    .progress-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .progress-label {
        font-size: 0.9rem;
        color: #6b7280;
        font-weight: 500;
    }

    .progress-value {
        font-size: 1rem;
        font-weight: 700;
        color: #10b981;
    }

    .progress-bar {
        height: 10px;
        background: #f3f4f6;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #10b981 0%, #059669 100%);
        border-radius: 10px;
        transition: width 0.3s ease;
    }

    .learning-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding-top: 20px;
        border-top: 2px solid #f3f4f6;
    }

    .next-step {
        flex: 1;
        display: flex;
        align-items: flex-start;
        gap: 8px;
        color: #6b7280;
        font-size: 0.875rem;
        line-height: 1.5;
    }

    .next-step svg {
        flex-shrink: 0;
        margin-top: 2px;
        color: #10b981;
    }

    .next-step a {
        color: #10b981;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .next-step a:hover {
        color: #059669;
    }

    .continue-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        font-weight: 600;
        padding: 12px 32px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .continue-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
    }

    /* MATERIALS SECTION */
    .materials-section {
        background: #f9fafb;
        padding: 80px 20px;
    }

    .materials-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .materials-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 32px;
        gap: 20px;
        flex-wrap: wrap;
    }

    .materials-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .materials-count {
        background: #f3f4f6;
        color: #6b7280;
        font-size: 1.25rem;
        padding: 4px 12px;
        border-radius: 12px;
        font-weight: 600;
    }

    .materials-header-right {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-icon-small {
        position: absolute;
        left: 14px;
        color: #9ca3af;
    }

    .materials-search {
        padding: 10px 16px 10px 42px;
        border: 2px solid #e5e7eb;
        border-radius: 50px;
        font-size: 0.95rem;
        outline: none;
        transition: all 0.3s ease;
        width: 200px;
    }

    .materials-search:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .filter-btn,
    .sort-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border: 2px solid #e5e7eb;
        border-radius: 50px;
        background: white;
        color: #1f2937;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover,
    .sort-btn:hover {
        border-color: #10b981;
        color: #10b981;
    }

    .status-filters {
        display: flex;
        gap: 12px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }

    .status-filter {
        padding: 10px 24px;
        border: 2px solid #e5e7eb;
        border-radius: 50px;
        background: white;
        color: #6b7280;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .status-filter:hover {
        border-color: #10b981;
        color: #10b981;
    }

    .status-filter.active {
        background: #10b981;
        border-color: #10b981;
        color: white;
    }

    .materials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 28px;
    }

    .material-card {
        background: white;
        border: 2px solid #f3f4f6;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .material-card:hover {
        border-color: #10b981;
        box-shadow: 0 20px 50px rgba(16, 185, 129, 0.1);
        transform: translateY(-5px);
    }

    .material-image {
        position: relative;
        height: 180px;
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        overflow: hidden;
    }

    .material-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .material-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: rgba(30, 41, 59, 0.9);
        backdrop-filter: blur(10px);
        color: white;
        padding: 6px 14px;
        border-radius: 10px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .material-content {
        padding: 24px;
    }

    .material-meta {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }

    .material-type {
        font-size: 0.875rem;
        font-weight: 600;
        color: #6b7280;
    }

    .material-type.quiz {
        color: #f59e0b;
    }

    .material-type.page {
        color: #3b82f6;
    }

    .material-type.path {
        color: #ec4899;
    }

    .material-type.course {
        color: #8b5cf6;
    }

    .material-certified,
    .material-score {
        font-size: 0.8rem;
        color: #6b7280;
    }

    .material-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 16px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .material-tags {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .material-tag {
        padding: 6px 12px;
        background: #f3f4f6;
        color: #6b7280;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .material-tag.urgent {
        background: #fef3c7;
        color: #92400e;
    }

    .material-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        padding-top: 20px;
        border-top: 2px solid #f3f4f6;
    }

    .material-points {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .points-icon {
        font-size: 1.25rem;
    }

    .points-text {
        font-size: 0.95rem;
        color: #6b7280;
    }

    .points-text strong {
        color: #10b981;
        font-size: 1.1rem;
    }

    .points-detail {
        font-size: 0.8rem;
        color: #9ca3af;
    }

    .material-progress {
        display: flex;
        align-items: center;
        gap: 8px;
        flex: 1;
    }

    .progress-bar-small {
        flex: 1;
        height: 8px;
        background: #f3f4f6;
        border-radius: 10px;
        overflow: hidden;
        min-width: 80px;
    }

    .progress-fill-small {
        height: 100%;
        background: linear-gradient(90deg, #10b981 0%, #059669 100%);
        border-radius: 10px;
    }

    .progress-percent {
        font-size: 0.875rem;
        font-weight: 700;
        color: #10b981;
        white-space: nowrap;
    }

    .material-status {
        font-size: 0.9rem;
        color: #6b7280;
    }

    .status-text {
        font-weight: 600;
    }

    .material-btn {
        padding: 10px 24px;
        border-radius: 50px;
        border: none;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .view-btn,
    .continue-small-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .view-btn:hover,
    .continue-small-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
    }

    .start-btn {
        background: white;
        border: 2px solid #10b981;
        color: #10b981;
    }

    .start-btn:hover {
        background: #10b981;
        color: white;
    }

    .load-more-wrapper {
        text-align: center;
        margin-top: 50px;
    }

    .load-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 40px;
        background: white;
        border: 2px solid #10b981;
        border-radius: 50px;
        color: #10b981;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .load-more-btn:hover {
        background: #10b981;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
    }

    /* RESPONSIVE */
    @media (max-width: 1200px) {
        .learning-grid {
            grid-template-columns: 1fr;
        }

        .materials-grid {
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        }
    }

    @media (max-width: 1024px) {
        .page-title {
            font-size: 2.5rem;
        }

        .learning-section-title,
        .materials-title {
            font-size: 1.75rem;
        }

        .materials-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .materials-header-right {
            width: 100%;
            flex-wrap: wrap;
        }

        .materials-search {
            flex: 1;
            min-width: 200px;
        }
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 120px 20px 60px;
        }

        .page-title {
            font-size: 2rem;
        }

        .page-subtitle {
            font-size: 1rem;
        }

        .continue-learning-section,
        .materials-section {
            padding: 60px 20px;
        }

        .learning-grid {
            grid-template-columns: 1fr;
        }

        .learning-section-title {
            font-size: 1.5rem;
            margin-bottom: 32px;
        }

        .course-title {
            font-size: 1.25rem;
        }

        .learning-footer {
            flex-direction: column;
            align-items: stretch;
        }

        .next-step {
            order: 2;
            margin-top: 16px;
        }

        .continue-btn {
            order: 1;
            width: 100%;
            justify-content: center;
        }

        .materials-title {
            font-size: 1.5rem;
        }

        .materials-header-right {
            flex-direction: column;
            width: 100%;
        }

        .search-wrapper,
        .materials-search,
        .filter-btn,
        .sort-btn {
            width: 100%;
        }

        .materials-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .material-title {
            font-size: 1.125rem;
        }

        .material-footer {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }

        .material-progress {
            order: 1;
        }

        .material-points {
            order: 1;
        }

        .material-btn {
            order: 2;
            width: 100%;
            justify-content: center;
        }

        .material-status {
            order: 1;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 1.75rem;
        }

        .page-subtitle {
            font-size: 0.95rem;
        }

        .learning-card-image {
            height: 160px;
        }

        .course-title {
            font-size: 1.125rem;
        }

        .material-image {
            height: 150px;
        }

        .materials-count {
            font-size: 1rem;
            padding: 2px 10px;
        }

        .status-filters {
            gap: 8px;
        }

        .status-filter {
            padding: 8px 16px;
            font-size: 0.875rem;
        }

        .material-content {
            padding: 20px;
        }

        .load-more-btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* ADDITIONAL ENHANCEMENTS */
    .material-card.completed {
        border-color: #d1fae5;
        background: linear-gradient(to bottom, white 0%, #f0fdf4 100%);
    }

    .material-card.completed .material-badge {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .material-card.in-progress .material-badge {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .material-card.not-started .material-badge {
        background: rgba(107, 114, 128, 0.9);
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Focus states for accessibility */
    .continue-btn:focus,
    .material-btn:focus,
    .filter-btn:focus,
    .sort-btn:focus,
    .status-filter:focus,
    .load-more-btn:focus {
        outline: 3px solid rgba(16, 185, 129, 0.3);
        outline-offset: 2px;
    }

    .materials-search:focus {
        outline: none;
    }

    /* Loading animation for Load More button */
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .load-more-btn.loading svg {
        animation: spin 1s linear infinite;
    }

    /* Empty state styling */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-state-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 12px;
    }

    .empty-state-text {
        font-size: 1rem;
        color: #6b7280;
        max-width: 400px;
        margin: 0 auto;
    }

    /* Skeleton loading states */
    .skeleton {
        background: linear-gradient(90deg, #f3f4f6 25%, #e5e7eb 50%, #f3f4f6 75%);
        background-size: 200% 100%;
        animation: loading 1.5s ease-in-out infinite;
    }

    @keyframes loading {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }

    .skeleton-card {
        height: 400px;
        border-radius: 20px;
    }

    /* Notification badge for new jobs */
    .new-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 4px 8px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        z-index: 10;
    }

    /* Tooltip styles */
    .tooltip {
        position: relative;
    }

    .tooltip::before {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(-8px);
        padding: 8px 12px;
        background: rgba(30, 41, 59, 0.95);
        color: white;
        font-size: 0.8rem;
        border-radius: 8px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
        z-index: 100;
    }

    .tooltip:hover::before {
        opacity: 1;
    }

    /* Application status indicators */
    .status-indicator {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-indicator.applied {
        background: #dbeafe;
        color: #1e40af;
    }

    .status-indicator.interviewing {
        background: #fef3c7;
        color: #92400e;
    }

    .status-indicator.rejected {
        background: #fee2e2;
        color: #991b1b;
    }

    .status-indicator.saved {
        background: #f3e8ff;
        color: #6b21a8;
    }

    /* Print styles */
    @media print {
        .page-header,
        .materials-header-right,
        .status-filters,
        .learning-footer,
        .material-footer,
        .load-more-wrapper {
            display: none;
        }

        .material-card,
        .learning-card {
            break-inside: avoid;
            page-break-inside: avoid;
        }
    }
</style>
@endsection