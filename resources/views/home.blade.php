@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-background">
        <img src="{{ asset('images/bg.jpg') }}" alt="Office Background">
    </div>
    
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-title">Your Next Career Move Starts Here</h1>
            <p class="hero-subtitle">
                Discover opportunities that match your skills, passion, and goals. From entry-level positions to executive roles, we connect you with companies ready to grow with you.
            </p>
            
            <div class="search-container">
                <div class="search-input-wrapper">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Job title, keywords, or company" class="search-input">
                </div>
                
                <div class="location-wrapper">
                    <svg class="location-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <select class="location-select">
                        <option>All Locations</option>
                        <option>Jakarta</option>
                        <option>Bandung</option>
                        <option>Surabaya</option>
                        <option>Semarang</option>
                        <option>Yogyakarta</option>
                    </select>
                </div>
                
                <button class="search-btn">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Search Jobs
                </button>
            </div>
            
            <div class="quick-tags">
                <span class="tag">Remote</span>
                <span class="tag">Full-time</span>
                <span class="tag">Part-time</span>
                <span class="tag">Internship</span>
            </div>
        </div>
    </div>
</section>

<!-- TRUSTED SECTION WITH STATS -->
<section class="trusted-section">
    <div class="trusted-content">
        <!-- Hero Stats -->

        <!-- Trusted Title -->
        <h2 class="trusted-title">
            Trusted by <span class="highlight">1000+</span> Companies Finding Best Talent
        </h2>

        <div class="hero-stats">
            <div class="stat-card">
                <div class="stat-number">10K+</div>
                <div class="stat-label">Active Jobs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">5K+</div>
                <div class="stat-label">Companies</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">50K+</div>
                <div class="stat-label">Job Seekers</div>
            </div>
        </div>
    </div>
</section>

<!-- EXPLORE OPPORTUNITIES BY CATEGORY SECTION -->
<section class="categories-section">
    <div class="categories-container">
        <div class="section-header">
            <span class="section-label">CATEGORY</span>
            <h2 class="section-title">Explore Opportunities By Category</h2>
            <p class="section-subtitle">Find the job that suits your passion and expertise. At Hey Job, you can explore more than 25 job categories tailored to different skills and industries</p>
        </div>

        <div class="categories-grid">
            <!-- Business -->
            <a href="/category/business" class="category-card">
                <div class="category-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="3" y="3" width="7" height="7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="14" y="3" width="7" height="7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="14" y="14" width="7" height="7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="3" y="14" width="7" height="7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="category-name">Business</h3>
                <p class="category-count">845 Jobs</p>
            </a>

            <!-- Informatics -->
            <a href="/category/informatics" class="category-card">
                <div class="category-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="2" y="3" width="20" height="14" rx="2" stroke-width="2"/>
                        <line x1="8" y1="21" x2="16" y2="21" stroke-width="2" stroke-linecap="round"/>
                        <line x1="12" y1="17" x2="12" y2="21" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="category-name">Informatics</h3>
                <p class="category-count">1092 Jobs</p>
            </a>

            <!-- Education -->
            <a href="/category/education" class="category-card">
                <div class="category-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 12v5c0 1 2 3 6 3s6-2 6-3v-5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="category-name">Education</h3>
                <p class="category-count">565 Jobs</p>
            </a>

            <!-- Finance -->
            <a href="/category/finance" class="category-card">
                <div class="category-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="2" y="4" width="20" height="16" rx="2" stroke-width="2"/>
                        <path d="M7 15h4M7 11h8M7 7h2" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="category-name">Finance</h3>
                <p class="category-count">912 Jobs</p>
            </a>

            <!-- Multimedia -->
            <a href="/category/multimedia" class="category-card">
                <div class="category-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="2" y="3" width="20" height="14" rx="2" stroke-width="2"/>
                        <polygon points="10 8 16 12 10 16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="category-name">Multimedia</h3>
                <p class="category-count">299 Jobs</p>
            </a>

            <!-- SEO & SMM -->
            <a href="/category/seo-smm" class="category-card">
                <div class="category-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="18" cy="5" r="3" stroke-width="2"/>
                        <circle cx="6" cy="12" r="3" stroke-width="2"/>
                        <circle cx="18" cy="19" r="3" stroke-width="2"/>
                        <line x1="8.5" y1="13.5" x2="15.5" y2="17.5" stroke-width="2"/>
                        <line x1="15.5" y1="6.5" x2="8.5" y2="10.5" stroke-width="2"/>
                    </svg>
                </div>
                <h3 class="category-name">SEO & SMM</h3>
                <p class="category-count">527 Jobs</p>
            </a>

            <!-- Industry -->
            <a href="/category/industry" class="category-card">
                <div class="category-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 21h18M4 18h16M6 18V9l5-3v12M16 18V6l-5 3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="8" y="12" width="2" height="2" stroke-width="2"/>
                        <rect x="11" y="12" width="2" height="2" stroke-width="2"/>
                    </svg>
                </div>
                <h3 class="category-name">Industry</h3>
                <p class="category-count">662 Jobs</p>
            </a>

            <!-- See More -->
            <a href="/categories" class="category-card category-card-more">
                <div class="more-content">
                    <div class="more-number">+ 25</div>
                    <p class="more-text">Based On Category</p>
                    <div class="more-link">
                        Lihat Semua 
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- CAREER OPPORTUNITIES SECTION -->
<section class="career-section">
    <div class="career-container">
        <div class="career-header">
            <div class="career-header-left">
                <span class="section-label">FIND YOUR JOB</span>
                <h2 class="section-title">Career Opportunities</h2>
                <p class="section-subtitle">Look in-detail at companies that have job openings, companies with the most applicant interest</p>
            </div>
            <a href="/jobs" class="see-all-btn">
                Lihat Semua 
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <div class="jobs-grid">
            <!-- Job Card 1 -->
            <div class="job-card">
                <div class="job-card-header">
                    <div class="company-logo">
                        <svg width="40" height="40" viewBox="0 0 40 40">
                            <rect width="40" height="40" rx="8" fill="#1e293b"/>
                            <text x="20" y="26" text-anchor="middle" fill="white" font-size="16" font-weight="bold">UI</text>
                        </svg>
                    </div>
                    <button class="save-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <h3 class="job-title">UI/UX Designer</h3>
                <div class="job-company">
                    <span class="company-name">BrightStar Studio</span>
                    <span class="separator">•</span>
                    <span class="applicants">384 Applicants</span>
                </div>
                <p class="job-description">Design intuitive and visually appealing digital experiences, collaborate with developers and conduct user testing</p>
                <div class="job-tags">
                    <span class="job-tag tag-level">Mid-Level</span>
                    <span class="job-tag tag-type">Full-Time</span>
                </div>
                <div class="job-footer">
                    <span class="job-salary">Rp 5.5jt - 12jt</span>
                    <span class="job-time">3 Days Ago</span>
                </div>
            </div>

            <!-- Job Card 2 -->
            <div class="job-card">
                <div class="job-card-header">
                    <div class="company-logo">
                        <svg width="40" height="40" viewBox="0 0 40 40">
                            <rect width="40" height="40" rx="8" fill="#ef4444"/>
                            <text x="20" y="26" text-anchor="middle" fill="white" font-size="16" font-weight="bold">DM</text>
                        </svg>
                    </div>
                    <button class="save-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <h3 class="job-title">Digital Marketing</h3>
                <div class="job-company">
                    <span class="company-name">TrendReach Media</span>
                    <span class="separator">•</span>
                    <span class="applicants">122 Applicants</span>
                </div>
                <p class="job-description">Plan and execute social media campaigns, optimize SEO/SEM strategies, and track performance analytics</p>
                <div class="job-tags">
                    <span class="job-tag tag-level">Entry-Level</span>
                    <span class="job-tag tag-type">Hybrid</span>
                </div>
                <div class="job-footer">
                    <span class="job-salary">Rp 6.5jt - 9.6jt</span>
                    <span class="job-time">5 Days Ago</span>
                </div>
            </div>

            <!-- Job Card 3 -->
            <div class="job-card">
                <div class="job-card-header">
                    <div class="company-logo">
                        <svg width="40" height="40" viewBox="0 0 40 40">
                            <rect width="40" height="40" rx="8" fill="#3b82f6"/>
                            <text x="20" y="26" text-anchor="middle" fill="white" font-size="16" font-weight="bold">FE</text>
                        </svg>
                    </div>
                    <button class="save-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <h3 class="job-title">Frontend Developer</h3>
                <div class="job-company">
                    <span class="company-name">CodeWave ID</span>
                    <span class="separator">•</span>
                    <span class="applicants">647 Applicants</span>
                </div>
                <p class="job-description">Develop responsive websites and applications using React, ensure high performance</p>
                <div class="job-tags">
                    <span class="job-tag tag-level">Mid-Level</span>
                    <span class="job-tag tag-type">Full-Time</span>
                </div>
                <div class="job-footer">
                    <span class="job-salary">Rp 10jt - 14jt</span>
                    <span class="job-time">1 Week Ago</span>
                </div>
            </div>

            <!-- Job Card 4 -->
            <div class="job-card">
                <div class="job-card-header">
                    <div class="company-logo">
                        <svg width="40" height="40" viewBox="0 0 40 40">
                            <rect width="40" height="40" rx="8" fill="#1e293b"/>
                            <text x="20" y="26" text-anchor="middle" fill="white" font-size="16" font-weight="bold">PM</text>
                        </svg>
                    </div>
                    <button class="save-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <h3 class="job-title">Project Manager</h3>
                <div class="job-company">
                    <span class="company-name">Summit Solutions</span>
                    <span class="separator">•</span>
                    <span class="applicants">92 Applicants</span>
                </div>
                <p class="job-description">Manage cross-functional teams, oversee project timelines, and ensure successful</p>
                <div class="job-tags">
                    <span class="job-tag tag-level">Senior-Level</span>
                    <span class="job-tag tag-type">Hybrid</span>
                </div>
                <div class="job-footer">
                    <span class="job-salary">Rp 15jt - 20jt</span>
                    <span class="job-time">2 Weeks Ago</span>
                </div>
            </div>

            <!-- Job Card 5 -->
            <div class="job-card">
                <div class="job-card-header">
                    <div class="company-logo">
                        <svg width="40" height="40" viewBox="0 0 40 40">
                            <rect width="40" height="40" rx="8" fill="#f43f5e"/>
                            <text x="20" y="26" text-anchor="middle" fill="white" font-size="16" font-weight="bold">CW</text>
                        </svg>
                    </div>
                    <button class="save-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <h3 class="job-title">Content Writer</h3>
                <div class="job-company">
                    <span class="company-name">Verge Media Co</span>
                    <span class="separator">•</span>
                    <span class="applicants">23 Applicants</span>
                </div>
                <p class="job-description">Write engaging articles, blog posts, and marketing copy that align with brand voice and strategy</p>
                <div class="job-tags">
                    <span class="job-tag tag-level">Entry-Level</span>
                    <span class="job-tag tag-type">Full-Time</span>
                </div>
                <div class="job-footer">
                    <span class="job-salary">Rp 3.5jt - 5.5jt</span>
                    <span class="job-time">2 Weeks Ago</span>
                </div>
            </div>

            <!-- Job Card 6 -->
            <div class="job-card">
                <div class="job-card-header">
                    <div class="company-logo">
                        <svg width="40" height="40" viewBox="0 0 40 40">
                            <rect width="40" height="40" rx="8" fill="#1e293b"/>
                            <text x="20" y="26" text-anchor="middle" fill="white" font-size="16" font-weight="bold">DA</text>
                        </svg>
                    </div>
                    <button class="save-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <h3 class="job-title">Data Analyst</h3>
                <div class="job-company">
                    <span class="company-name">Insight Analytics Group</span>
                    <span class="separator">•</span>
                    <span class="applicants">156 Applicants</span>
                </div>
                <p class="job-description">Collect, interpret, and analyze complex datasets to provide actionable insights for business</p>
                <div class="job-tags">
                    <span class="job-tag tag-level">Mid-Level</span>
                    <span class="job-tag tag-type">Full-Time</span>
                </div>
                <div class="job-footer">
                    <span class="job-salary">Rp 9jt - 13jt</span>
                    <span class="job-time">1 Week Ago</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS SECTION -->
<section class="testimonials-section">
    <div class="testimonials-container">
        <div class="section-header">
            <span class="section-label">TESTIMONIALS</span>
            <h2 class="section-title">What They Say About Us?</h2>
        </div>

        <div class="testimonials-wrapper">
            <div class="testimonial-main">
                <div class="testimonial-content">
                    <p class="testimonial-text">
                        Our Company Is Truly Upstanding And Is Behind Its Product 100%. Job Is The Most Valuable Business Resource We Have EVER Purchased. I'm Good To Go. We Have No Regrets!
                    </p>
                    <div class="testimonial-author">
                        <h4 class="author-name">Dorian Fani</h4>
                        <p class="author-role">Marketing Specialist</p>
                    </div>
                </div>

                <div class="testimonial-image">
                    <div class="main-avatar">
                        <img src="{{ asset('images/main-avatar.jpg') }}" alt="Dorian Fani">
                    </div>
                    
                    <!-- Floating Avatars -->
                    <div class="floating-avatar avatar-1">
                        <img src="{{ asset('images/avatar-1.jpg') }}" alt="User">
                    </div>
                    <div class="floating-avatar avatar-2">
                        <img src="{{ asset('images/avatar-2.jpg') }}" alt="User">
                    </div>
                    <div class="floating-avatar avatar-3">
                        <img src="{{ asset('images/avatar-3.jpg') }}" alt="User">
                    </div>
                    <div class="floating-avatar avatar-4">
                        <img src="{{ asset('images/avatar-4.jpg') }}" alt="User">
                    </div>
                    <div class="floating-avatar avatar-5">
                        <img src="{{ asset('images/avatar-5.jpg') }}" alt="User">
                    </div>
                    
                    <!-- Decorative Circles -->
                    <div class="decorative-circle circle-1"></div>
                    <div class="decorative-circle circle-2"></div>
                </div>
            </div>

            <div class="testimonial-navigation">
                <button class="nav-btn prev-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M15 18l-6-6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="nav-btn next-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M9 18l6-6-6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- NEWS & RESOURCES SECTION -->
<section class="news-section">
    <div class="news-container">
        <div class="section-header">
            <span class="section-label">NEWS & RESOURCES</span>
            <h2 class="section-title">Smart Tips & Tricks To Land Your Dream Job</h2>
            <p class="section-subtitle">Landing your dream job takes more than just sending out applications. From crafting a standout resume to mastering interview skills, every step matters</p>
        </div>

        <div class="news-grid">
            <!-- News Card 1 -->
            <article class="news-card">
                <div class="news-image">
                    <img src="{{ asset('images/news-1.jpg') }}" alt="How to Craft a Document That Gets You Hired">
                    <div class="news-overlay"></div>
                </div>
                <div class="news-content">
                    <h3 class="news-title">How to Craft a Document That Gets You Hired</h3>
                    <p class="news-excerpt">Learn how to craft a resume that stands out and gets noticed by recruiters.</p>
                    <a href="/news/craft-document" class="news-link">
                        Read More
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </article>

            <!-- News Card 2 -->
            <article class="news-card">
                <div class="news-image">
                    <img src="{{ asset('images/news-2.jpg') }}" alt="Top Interview Questions and How to Answer Them">
                    <div class="news-overlay"></div>
                </div>
                <div class="news-content">
                    <h3 class="news-title">Top Interview Questions and How to Answer Them</h3>
                    <p class="news-excerpt">Prepare with confidence by exploring the most common interview questions and winning answers.</p>
                    <a href="/news/interview-questions" class="news-link">
                        Read More
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </article>

            <!-- News Card 3 -->
            <article class="news-card">
                <div class="news-image">
                    <img src="{{ asset('images/news-3.jpg') }}" alt="Building a Professional Online Presence">
                    <div class="news-overlay"></div>
                </div>
                <div class="news-content">
                    <h3 class="news-title">Building a Professional Online Presence</h3>
                    <p class="news-excerpt">Discover how a newish and personal branding can boost your chances of landing your dream job.</p>
                    <a href="/news/online-presence" class="news-link">
                        Read More
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </article>
        </div>

        <div class="news-footer">
            <a href="/news" class="see-all-btn">
                See All Articles
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<style>
    /* HERO SECTION - Adjusted */
    .hero-section {
        position: relative;
        min-height: 82vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 140px 20px 40px;
        overflow: hidden;
        margin-top: -100px;
    }

    .hero-background {
        position: absolute;
        inset: 0;
        z-index: 0;
    }

    .hero-background img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9) 0%, rgba(5, 150, 105, 0.85) 50%, rgba(4, 120, 87, 0.9) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 10;
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
    }

    .hero-text {
        text-align: center;
        color: white;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
        color: white;
        text-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    .hero-subtitle {
        font-size: 1.125rem;
        line-height: 1.7;
        margin-bottom: 40px;
        color: rgba(255, 255, 255, 0.95);
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .search-container {
        background: white;
        border-radius: 60px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        padding: 8px;
        display: flex;
        gap: 8px;
        max-width: 900px;
        margin: 0 auto 28px;
        align-items: center;
    }

    .search-input-wrapper,
    .location-wrapper {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        flex: 1;
    }

    .search-icon,
    .location-icon {
        width: 22px;
        height: 22px;
        color: #9ca3af;
        margin-right: 12px;
        flex-shrink: 0;
    }

    .search-input,
    .location-select {
        width: 100%;
        border: none;
        outline: none;
        color: #1f2937;
        font-size: 1rem;
        background: transparent;
        font-family: inherit;
    }

    .location-select {
        cursor: pointer;
    }

    .search-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        font-weight: 600;
        padding: 16px 40px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
    }

    .quick-tags {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .tag {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 0.9rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .tag:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    /* TRUSTED SECTION WITH STATS - Compact Version */
    .trusted-section {
        background: #ffffff;
        padding: 50px 20px;
        margin-top: -20px;
        position: relative;
        z-index: 10;
    }

    .trusted-content {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }

    /* Hero Stats - Compact */
    .hero-stats {
        display: flex;
        gap: 40px;
        justify-content: center;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }

    .stat-card {
        text-align: center;
        padding: 24px 36px;
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
        border-radius: 20px;
        transition: all 0.3s ease;
        min-width: 160px;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.1);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.25);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 8px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-label {
        font-size: 0.95rem;
        color: #059669;
        font-weight: 600;
    }

    .trusted-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
        line-height: 1.3;
        padding-bottom: 40px;
    }

    .highlight {
        color: #10b981;
        position: relative;
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-stats {
            gap: 30px;
        }

        .stat-number {
            font-size: 2.25rem;
        }

        .stat-card {
            min-width: 140px;
            padding: 20px 30px;
        }

        .trusted-title {
            font-size: 1.875rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 65vh;
            padding: 120px 20px 30px;
        }

        .hero-title {
            font-size: 2rem;
            margin-bottom: 16px;
        }

        .hero-subtitle {
            font-size: 1rem;
            margin-bottom: 32px;
        }

        .search-container {
            flex-direction: column;
            padding: 16px;
            border-radius: 30px;
            margin-bottom: 24px;
        }

        .search-input-wrapper,
        .location-wrapper {
            width: 100%;
        }

        .search-btn {
            width: 100%;
            justify-content: center;
        }

        .trusted-section {
            padding: 40px 20px;
        }

        .hero-stats {
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            width: calc(50% - 10px);
            min-width: auto;
            padding: 18px 20px;
        }

        .stat-card:last-child {
            width: calc(50% - 10px);
        }

        .stat-number {
            font-size: 2rem;
        }

        .stat-label {
            font-size: 0.875rem;
        }

        .trusted-title {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .hero-section {
            min-height: 60vh;
        }

        .hero-title {
            font-size: 1.75rem;
        }

        .hero-subtitle {
            font-size: 0.95rem;
        }

        .hero-stats {
            flex-direction: column;
            gap: 16px;
        }

        .stat-card {
            width: 100%;
        }

        .stat-card:last-child {
            width: 100%;
        }

        .stat-number {
            font-size: 1.875rem;
        }

        .trusted-title {
            font-size: 1.375rem;
        }
    }

    /* CATEGORIES SECTION */
    .categories-section {
        background: #f9fafb;
        padding: 100px 20px;
    }

    .categories-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-label {
        display: inline-block;
        color: #10b981;
        font-size: 0.875rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .section-title {
        font-size: 2.75rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 16px;
        line-height: 1.2;
    }

    .section-subtitle {
        font-size: 1.125rem;
        color: #6b7280;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.7;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
    }

    .category-card {
        background: white;
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .category-card:hover {
        transform: translateY(-8px);
        border-color: #10b981;
        box-shadow: 0 20px 50px rgba(16, 185, 129, 0.15);
    }

    .category-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        color: #10b981;
        transition: all 0.3s ease;
    }

    .category-card:hover .category-icon {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        transform: scale(1.1);
    }

    .category-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .category-count {
        font-size: 1rem;
        color: #9ca3af;
        font-weight: 500;
    }

    .category-card-more {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        border: 2px dashed #10b981;
    }

    .category-card-more:hover {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .more-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .more-number {
        font-size: 3rem;
        font-weight: 800;
        color: #10b981;
        transition: all 0.3s ease;
    }

    .category-card-more:hover .more-number,
    .category-card-more:hover .more-text,
    .category-card-more:hover .more-link {
        color: white;
    }

    .more-text {
        font-size: 1rem;
        color: #059669;
        font-weight: 600;
    }

    .more-link {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #10b981;
        font-weight: 600;
        font-size: 0.95rem;
    }

    /* CAREER SECTION */
    .career-section {
        background: white;
        padding: 100px 20px;
    }

    .career-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .career-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 60px;
        gap: 40px;
    }

    .career-header-left {
        flex: 1;
    }

    .see-all-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        background: white;
        border: 2px solid #10b981;
        border-radius: 50px;
        color: #10b981;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .see-all-btn:hover {
        background: #10b981;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
    }

    .jobs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 28px;
    }

    .job-card {
        background: white;
        border: 2px solid #f3f4f6;
        border-radius: 20px;
        padding: 28px;
        transition: all 0.3s ease;
    }

    .job-card:hover {
        border-color: #10b981;
        box-shadow: 0 20px 50px rgba(16, 185, 129, 0.1);
        transform: translateY(-5px);
    }

    .job-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .company-logo {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        overflow: hidden;
    }

    .save-btn {
        width: 40px;
        height: 40px;
        border: 2px solid #f3f4f6;
        border-radius: 10px;
        background: white;
        color: #9ca3af;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .save-btn:hover {
        border-color: #10b981;
        color: #10b981;
        transform: scale(1.1);
    }

    .job-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 12px;
    }

    .job-company {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }

    .company-name {
        color: #6b7280;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .separator {
        color: #d1d5db;
    }

    .applicants {
        color: #9ca3af;
        font-size: 0.875rem;
    }

    .job-description {
        color: #6b7280;
        line-height: 1.7;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }

    .job-tags {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .job-tag {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .tag-level {
        background: #fef3c7;
        color: #92400e;
    }

    .tag-type {
        background: #d1fae5;
        color: #065f46;
    }

    .job-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 2px solid #f3f4f6;
    }

    .job-salary {
        font-weight: 700;
        color: #10b981;
        font-size: 1rem;
    }

    .job-time {
        color: #9ca3af;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .section-title {
            font-size: 2.25rem;
        }

        .categories-grid {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        .jobs-grid {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .career-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .see-all-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .categories-section,
        .career-section {
            padding: 60px 20px;
        }

        .section-title {
            font-size: 1.875rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .categories-grid {
            grid-template-columns: 1fr;
        }

        .jobs-grid {
            grid-template-columns: 1fr;
        }

        .job-title {
            font-size: 1.25rem;
        }
    }
    /* TESTIMONIALS SECTION */
    .testimonials-section {
        background: linear-gradient(135deg, #047857 0%, #065f46 50%, #064e3b 100%);
        padding: 70px 20px;
        position: relative;
        overflow: hidden;
    }

    .testimonials-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="100" fill="none"/><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.05)"/></svg>');
        opacity: 0.3;
    }

    .testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .testimonials-section .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .testimonials-section .section-label {
        color: #a7f3d0;
    }

    .testimonials-section .section-title {
        color: white;
        font-size: 2.5rem;
    }

    .testimonials-wrapper {
        position: relative;
    }

    .testimonial-main {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: center;
    }

    .testimonial-content {
        padding: 20px;
    }

    .testimonial-text {
        font-size: 1.125rem;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 30px;
        font-weight: 400;
    }

    .testimonial-author {
        padding-left: 16px;
        border-left: 3px solid #10b981;
    }

    .author-name {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        margin-bottom: 6px;
    }

    .author-role {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .testimonial-image {
        position: relative;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .main-avatar {
        width: 280px;
        height: 280px;
        border-radius: 50%;
        overflow: hidden;
        border: 6px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 2;
    }

    .main-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .floating-avatar {
        position: absolute;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        cursor: pointer;
        background: white;
    }

    .floating-avatar:hover {
        transform: scale(1.15);
        border-color: #10b981;
        z-index: 3;
    }

    .floating-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-1 {
        top: 10px;
        right: 60px;
        animation: float 3s ease-in-out infinite;
    }

    .avatar-2 {
        top: 40px;
        left: 30px;
        animation: float 4s ease-in-out infinite 0.5s;
    }

    .avatar-3 {
        bottom: 60px;
        right: 30px;
        animation: float 3.5s ease-in-out infinite 1s;
    }

    .avatar-4 {
        bottom: 40px;
        left: 60px;
        animation: float 4.5s ease-in-out infinite 1.5s;
    }

    .avatar-5 {
        top: 140px;
        right: -15px;
        animation: float 3s ease-in-out infinite 2s;
    }

    .decorative-circle {
        position: absolute;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.1);
        pointer-events: none;
    }

    .circle-1 {
        width: 80px;
        height: 80px;
        top: 60px;
        left: -10px;
        animation: pulse 3s ease-in-out infinite;
    }

    .circle-2 {
        width: 50px;
        height: 50px;
        bottom: 80px;
        right: 100px;
        animation: pulse 4s ease-in-out infinite 1s;
    }

    .testimonial-navigation {
        display: flex;
        gap: 12px;
        margin-top: 40px;
        justify-content: center;
    }

    .nav-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-btn:hover {
        background: #10b981;
        border-color: #10b981;
        transform: scale(1.1);
    }

    /* ANIMATIONS */
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 0.3;
        }
        50% {
            transform: scale(1.1);
            opacity: 0.5;
        }
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .testimonial-main {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .testimonial-image {
            height: 320px;
        }

        .main-avatar {
            width: 240px;
            height: 240px;
        }

        .floating-avatar {
            width: 55px;
            height: 55px;
        }
    }

    @media (max-width: 768px) {
        .testimonials-section {
            padding: 50px 20px;
        }

        .testimonials-section .section-title {
            font-size: 1.875rem;
        }

        .testimonial-text {
            font-size: 1rem;
        }

        .testimonial-image {
            height: 280px;
        }

        .main-avatar {
            width: 200px;
            height: 200px;
        }

        .floating-avatar {
            width: 50px;
            height: 50px;
            border-width: 2px;
        }

        .avatar-1 {
            top: 5px;
            right: 30px;
        }

        .avatar-2 {
            top: 30px;
            left: 15px;
        }

        .avatar-3 {
            bottom: 40px;
            right: 15px;
        }

        .avatar-4 {
            bottom: 30px;
            left: 30px;
        }

        .avatar-5 {
            top: 110px;
            right: -5px;
        }

        .author-name {
            font-size: 1.125rem;
        }

        .nav-btn {
            width: 40px;
            height: 40px;
        }

        .circle-1 {
            width: 60px;
            height: 60px;
        }

        .circle-2 {
            width: 40px;
            height: 40px;
        }
    }

    /* NEWS & RESOURCES SECTION */
    .news-section {
        background: #f9fafb;
        padding: 80px 20px;
    }

    .news-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .news-section .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .news-section .section-label {
        display: inline-block;
        color: #6b7280;
        font-size: 0.875rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .news-section .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 16px;
        line-height: 1.2;
    }

    .news-section .section-subtitle {
        font-size: 1.125rem;
        color: #6b7280;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.7;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
        gap: 32px;
        margin-bottom: 50px;
    }

    .news-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .news-image {
        position: relative;
        width: 100%;
        height: 280px;
        overflow: hidden;
    }

    .news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .news-card:hover .news-image img {
        transform: scale(1.1);
    }

    .news-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.3) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .news-card:hover .news-overlay {
        opacity: 1;
    }

    .news-content {
        padding: 32px;
    }

    .news-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 16px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-excerpt {
        color: #6b7280;
        line-height: 1.7;
        margin-bottom: 20px;
        font-size: 0.95rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #10b981;
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .news-link:hover {
        gap: 12px;
        color: #059669;
    }

    .news-link svg {
        transition: transform 0.3s ease;
    }

    .news-link:hover svg {
        transform: translateX(4px);
    }

    .news-footer {
        text-align: center;
        margin-top: 40px;
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .news-grid {
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 28px;
        }

        .news-section .section-title {
            font-size: 2.25rem;
        }
    }

    @media (max-width: 768px) {
        .news-section {
            padding: 60px 20px;
        }

        .news-section .section-title {
            font-size: 1.875rem;
        }

        .news-section .section-subtitle {
            font-size: 1rem;
        }

        .news-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .news-image {
            height: 240px;
        }

        .news-content {
            padding: 24px;
        }

        .news-title {
            font-size: 1.25rem;
        }
    }

</style>
@endsection