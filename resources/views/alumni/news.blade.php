@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="page-header-content">
        <h1 class="page-title">News & Highlights</h1>
        <p class="page-subtitle">Stay updated with alumni success stories, career insights, and university events</p>
    </div>
</section>

<section class="featured-section">
    <div class="main-container">
        <h2 class="section-heading">Trending Stories 🔥</h2>
        
        <div class="hero-grid">
            <div class="hero-card main-hero">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80" alt="Featured News - CEO Startup" class="hero-bg">
                <div class="hero-overlay">
                    <div class="hero-content">
                        <span class="hero-badge">Alumni Spotlight</span>
                        <h3 class="hero-title">Perjalanan Inspiratif: Dari Mahasiswa Teknik Menjadi CEO Startup Unicorn</h3>
                        <p class="hero-excerpt">Simak kisah lengkap Budi Santoso, alumni angkatan 2018 yang berhasil membawa inovasi teknologi hijau ke kancah internasional.</p>
                        <div class="hero-meta">
                            <span>Dec 12, 2025</span> • <span>5 min read</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-side-wrapper">
                <div class="hero-card side-hero">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Side News - Career Skills" class="hero-bg">
                    <div class="hero-overlay">
                        <div class="hero-content">
                            <span class="hero-badge job">Career Insight</span>
                            <h4 class="hero-title-small">Top 10 Skill yang Paling Dicari Perusahaan di Tahun 2026</h4>
                        </div>
                    </div>
                </div>
                <div class="hero-card side-hero">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Side News - Job Fair" class="hero-bg">
                    <div class="hero-overlay">
                        <div class="hero-content">
                            <span class="hero-badge event">University Event</span>
                            <h4 class="hero-title-small">Job Fair Akbar: Hadirkan 50+ Perusahaan Multinasional</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news-feed-section">
    <div class="main-container">
        <div class="feed-header">
            <div class="feed-header-left">
                <h2 class="section-heading">Latest Updates</h2>
            </div>
            <div class="feed-header-right">
                <div class="search-wrapper">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <input type="text" placeholder="Search news..." class="news-search">
                </div>
            </div>
        </div>

        <div class="category-filters">
            <button class="cat-btn active">All Stories</button>
            <button class="cat-btn">Alumni Profiles</button>
            <button class="cat-btn">Career Tips</button>
            <button class="cat-btn">Campus News</button>
            <button class="cat-btn">Scholarships</button>
        </div>

        <div class="news-grid">
            <article class="news-card">
                <div class="news-img-wrapper">
                    <span class="news-category alumni">Alumni Profile</span>
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="News Image - Reuni Akbar">
                </div>
                <div class="news-body">
                    <div class="news-meta">
                        <span class="date">Dec 10, 2025</span>
                        <span class="dot">•</span>
                        <span class="author">By Admin</span>
                    </div>
                    <h3 class="news-title"><a href="#">Reuni Akbar 2025: Mempererat Koneksi Antar Generasi</a></h3>
                    <p class="news-excerpt">Ribuan alumni memadati aula utama universitas dalam acara reuni terbesar dekade ini. Lihat keseruannya di sini.</p>
                    <div class="news-footer">
                        <a href="#" class="read-more">
                            Read Article 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </article>

            <article class="news-card">
                <div class="news-img-wrapper">
                    <span class="news-category career">Career Tips</span>
                    <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="News Image - Tips CV">
                </div>
                <div class="news-body">
                    <div class="news-meta">
                        <span class="date">Dec 08, 2025</span>
                        <span class="dot">•</span>
                        <span class="author">By HR Team</span>
                    </div>
                    <h3 class="news-title"><a href="#">Tips Menulis CV yang Lolos Screening ATS</a></h3>
                    <p class="news-excerpt">Jangan biarkan CV Anda terbuang percuma. Pelajari cara optimasi kata kunci agar dilirik oleh sistem rekrutmen.</p>
                    <div class="news-footer">
                        <a href="#" class="read-more">
                            Read Article 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </article>

            <article class="news-card">
                <div class="news-img-wrapper">
                    <span class="news-category scholarship">Scholarship</span>
                    <img src="https://mdk.poltekparmakassar.ac.id/storage/2025/05/panduan-lengkap-syarat-dan-cara-daftar-beasiswa-adik-2025-untuk-mahasiswa-baru.jpg" alt="News Image - Beasiswa S2">
                </div>
                <div class="news-body">
                    <div class="news-meta">
                        <span class="date">Dec 05, 2025</span>
                        <span class="dot">•</span>
                        <span class="author">By Partnership</span>
                    </div>
                    <h3 class="news-title"><a href="#">Beasiswa S2 Luar Negeri Full Funded Dibuka Kembali</a></h3>
                    <p class="news-excerpt">Kesempatan emas bagi alumni yang ingin melanjutkan studi. Cek syarat dan ketentuan pendaftarannya.</p>
                    <div class="news-footer">
                        <a href="#" class="read-more">
                            Read Article 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </article>

            <article class="news-card">
                <div class="news-img-wrapper">
                    <span class="news-category alumni">Alumni Profile</span>
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="News Image - Ahmad Dani">
                </div>
                <div class="news-body">
                    <div class="news-meta">
                        <span class="date">Nov 28, 2025</span>
                        <span class="dot">•</span>
                        <span class="author">By Editorial</span>
                    </div>
                    <h3 class="news-title"><a href="#">Ahmad Dani: Membangun Desa dengan Teknologi IoT</a></h3>
                    <p class="news-excerpt">Alumni Teknik Elektro ini kembali ke kampung halaman dan merevolusi pertanian menggunakan sensor cerdas.</p>
                    <div class="news-footer">
                        <a href="#" class="read-more">
                            Read Article 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </article>
             <article class="news-card">
                <div class="news-img-wrapper">
                    <span class="news-category career">Career Tips</span>
                    <img src="https://images.unsplash.com/photo-1593642532400-2682810df593?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1469&q=80" alt="News Image - Remote Work">
                </div>
                <div class="news-body">
                    <div class="news-meta">
                        <span class="date">Nov 25, 2025</span>
                        <span class="dot">•</span>
                        <span class="author">By Career Center</span>
                    </div>
                    <h3 class="news-title"><a href="#">Remote Work: Peluang dan Tantangan di 2026</a></h3>
                    <p class="news-excerpt">Apakah bekerja dari rumah masih menjadi tren? Bagaimana cara menjaga produktivitas? Simak ulasannya.</p>
                    <div class="news-footer">
                        <a href="#" class="read-more">
                            Read Article 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </article>

            <article class="news-card">
                <div class="news-img-wrapper">
                    <span class="news-category event">Event</span>
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="News Image - Webinar Mental Health">
                </div>
                <div class="news-body">
                    <div class="news-meta">
                        <span class="date">Nov 20, 2025</span>
                        <span class="dot">•</span>
                        <span class="author">By Committee</span>
                    </div>
                    <h3 class="news-title"><a href="#">Webinar: Mental Health di Lingkungan Kerja</a></h3>
                    <p class="news-excerpt">Pentingnya menjaga kesehatan mental di tengah tekanan pekerjaan. Gabung webinar gratis minggu depan.</p>
                    <div class="news-footer">
                        <a href="#" class="read-more">
                            Read Article 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </article>
        </div>

        <div class="load-more-wrapper">
            <button class="load-more-btn">
                Load More Stories
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>
</section>

<style>
    /* SHARED STYLES */
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

    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    .section-heading {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 24px;
    }

    /* HERO SECTION STYLES - FIXED LAYOUT */
    .featured-section {
        background: white;
        padding: 60px 20px 80px 20px; /* Added more bottom padding */
        position: relative;
        z-index: 2; /* Ensures this sits on top */
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        min-height: 500px; /* Changed from fixed height to min-height */
        height: auto; /* Allows growing if content overflows */
    }

    .hero-card {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #f3f4f6; /* Fallback color */
        min-height: 240px; /* Ensure small cards have minimum height */
    }

    .hero-card.main-hero {
        min-height: 500px;
    }

    .hero-card:hover {
        transform: scale(1.01);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        z-index: 5;
    }

    .hero-bg {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
        position: absolute; /* Fixes image fill */
        top: 0;
        left: 0;
    }

    .hero-card:hover .hero-bg {
        transform: scale(1.05);
    }

    .hero-overlay {
        position: relative; /* Changed context */
        height: 100%;
        width: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 60%, rgba(0,0,0,0.1) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 30px;
        z-index: 2;
    }

    .hero-badge {
        display: inline-block;
        background: #10b981;
        color: white;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 700;
        margin-bottom: 12px;
        align-self: flex-start;
    }

    .hero-badge.job { background: #3b82f6; }
    .hero-badge.event { background: #8b5cf6; }

    .hero-title {
        color: white;
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 12px;
        line-height: 1.2;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .hero-title-small {
        color: white;
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1.3;
    }

    .hero-excerpt {
        color: rgba(255,255,255,0.9);
        font-size: 1rem;
        margin-bottom: 16px;
        max-width: 80%;
        line-height: 1.5;
    }

    .hero-meta {
        color: rgba(255,255,255,0.7);
        font-size: 0.875rem;
        font-weight: 500;
    }

    .hero-side-wrapper {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .side-hero {
        flex: 1;
    }

    /* NEWS FEED SECTION - FIXED POSITIONING */
    .news-feed-section {
        background: #f9fafb;
        padding: 80px 20px;
        position: relative;
        z-index: 1; 
        margin-top: 20px; /* Adds clear separation from the hero section */
    }

    .feed-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-icon {
        position: absolute;
        left: 14px;
        color: #9ca3af;
    }

    .news-search {
        padding: 12px 16px 12px 42px;
        border: 2px solid #e5e7eb;
        border-radius: 50px;
        font-size: 0.95rem;
        outline: none;
        transition: all 0.3s ease;
        width: 250px;
    }

    .news-search:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .category-filters {
        display: flex;
        gap: 12px;
        margin-bottom: 40px;
        flex-wrap: wrap;
        overflow-x: auto;
        padding-bottom: 4px;
    }

    .cat-btn {
        padding: 10px 24px;
        border: 2px solid #e5e7eb;
        border-radius: 50px;
        background: white;
        color: #6b7280;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .cat-btn:hover {
        border-color: #10b981;
        color: #10b981;
    }

    .cat-btn.active {
        background: #10b981;
        border-color: #10b981;
        color: white;
    }

    /* CARD STYLE */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 32px;
    }

    .news-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 1;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border-color: #10b981;
        z-index: 5;
    }

    .news-img-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .news-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .news-card:hover .news-img-wrapper img {
        transform: scale(1.05);
    }

    .news-category {
        position: absolute;
        top: 16px;
        left: 16px;
        background: rgba(255, 255, 255, 0.95);
        color: #1f2937;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        z-index: 2;
    }

    .news-category.alumni { color: #10b981; border-bottom: 2px solid #10b981; }
    .news-category.career { color: #3b82f6; border-bottom: 2px solid #3b82f6; }
    .news-category.scholarship { color: #f59e0b; border-bottom: 2px solid #f59e0b; }
    .news-category.event { color: #8b5cf6; border-bottom: 2px solid #8b5cf6; }

    .news-body {
        padding: 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .news-meta {
        font-size: 0.8rem;
        color: #9ca3af;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .news-title {
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .news-title a {
        color: #1f2937;
        text-decoration: none;
        transition: color 0.2s;
    }

    .news-title a:hover {
        color: #10b981;
    }

    .news-excerpt {
        font-size: 0.95rem;
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 20px;
        flex: 1;
    }

    .news-footer {
        padding-top: 20px;
        border-top: 1px solid #f3f4f6;
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        color: #10b981;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        transition: gap 0.3s ease;
    }

    .read-more:hover {
        gap: 8px;
        color: #059669;
    }

    /* NEWSLETTER SECTION */
    .newsletter-section {
        padding: 80px 20px;
        background: white;
        position: relative;
        z-index: 1;
    }

    .newsletter-container {
        max-width: 1000px;
        margin: 0 auto;
        background: linear-gradient(135deg, #10b981 0%, #047857 100%);
        border-radius: 30px;
        padding: 60px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .newsletter-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></svg>');
        opacity: 0.2;
    }

    .newsletter-content {
        position: relative;
        z-index: 1;
    }

    .newsletter-content h2 {
        color: white;
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .newsletter-content p {
        color: rgba(255,255,255,0.9);
        margin-bottom: 32px;
        font-size: 1.1rem;
    }

    .subscribe-form {
        display: flex;
        justify-content: center;
        gap: 12px;
        max-width: 500px;
        margin: 0 auto;
    }

    .subscribe-form input {
        flex: 1;
        padding: 14px 24px;
        border-radius: 50px;
        border: none;
        font-size: 1rem;
        outline: none;
    }

    .subscribe-form button {
        background: #1f2937;
        color: white;
        border: none;
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .subscribe-form button:hover {
        transform: translateY(-2px);
        background: #000;
    }

    /* LOAD MORE BUTTON */
    .load-more-wrapper {
        text-align: center;
        margin-top: 60px;
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

    /* RESPONSIVE MEDIA QUERIES */
    @media (max-width: 1024px) {
        .hero-grid {
            height: auto;
            grid-template-columns: 1fr;
        }
        
        .hero-card.main-hero {
            min-height: 400px;
        }

        .hero-side-wrapper {
            flex-direction: row;
            height: auto;
            gap: 20px;
        }

        .side-hero {
            min-height: 250px;
        }
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 120px 20px 60px;
        }

        .page-title {
            font-size: 2rem;
        }

        .hero-card.main-hero {
            min-height: 300px;
        }

        .hero-side-wrapper {
            flex-direction: column;
        }
        
        .side-hero {
            min-height: 200px;
        }
        
        .hero-title {
            font-size: 1.5rem;
        }

        .news-grid {
            grid-template-columns: 1fr;
        }

        .subscribe-form {
            flex-direction: column;
        }
        
        .subscribe-form button {
            width: 100%;
        }

        .feed-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .search-wrapper, .news-search {
            width: 100%;
        }
    }
</style>
@endsection