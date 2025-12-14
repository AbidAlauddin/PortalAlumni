@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="page-header-overlay"></div>
    <div class="page-header-content">
        <h1 class="page-title">Community Forum</h1>
        <p class="page-subtitle">Diskusi, berbagi ilmu, dan bangun koneksi profesional Anda di sini.</p>
    </div>
</section>

<div class="forum-layout">
    
    <div class="forum-title-wrapper">
        <h2 class="forum-section-title">Recent Forums Activity</h2>
    </div>

    <div class="forum-container">
        
        <aside class="forum-sidebar-left">
            <div class="sidebar-widget create-widget">
                <button class="create-topic-btn" onclick="openModal()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                    Buat Topik Baru
                </button>
            </div>

            <div class="sidebar-widget nav-widget">
                <h3 class="widget-title">Menu Forum</h3>
                <ul class="nav-list">
                    <li class="nav-item active">
                        <a href="#">
                            <span class="icon">🏠</span> Beranda Forum
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <span class="icon">🔥</span> Sedang Hangat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <span class="icon">🔖</span> Disimpan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <span class="icon">🚩</span> Topik Saya
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-widget category-widget">
                <h3 class="widget-title">Kategori</h3>
                <ul class="category-list">
                    <li><a href="#" class="cat-link"><span class="cat-dot career"></span>Karier <span class="count">124</span></a></li>
                    <li><a href="#" class="cat-link"><span class="cat-dot job"></span>Lowongan Kerja <span class="count">45</span></a></li>
                    <li><a href="#" class="cat-link"><span class="cat-dot alumni"></span>Diskusi Alumni <span class="count">89</span></a></li>
                    <li><a href="#" class="cat-link"><span class="cat-dot interview"></span>Tips Interview <span class="count">67</span></a></li>
                    <li><a href="#" class="cat-link"><span class="cat-dot event"></span>Event & Seminar <span class="count">23</span></a></li>
                    <li><a href="#" class="cat-link"><span class="cat-dot general"></span>Umum <span class="count">112</span></a></li>
                </ul>
            </div>
        </aside>

        <main class="forum-main">
            
            <div class="forum-controls">
                <div class="search-bar">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                    <input type="text" placeholder="Cari diskusi, pertanyaan, atau topik...">
                </div>
                <div class="sort-wrapper">
                    <select class="sort-select">
                        <option>Terbaru</option>
                        <option>Paling Ramai</option>
                        <option>Terbanyak Like</option>
                    </select>
                </div>
            </div>

            <article class="discussion-card pinned">
                <div class="card-header">
                    <div class="user-meta">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=facearea&facepad=2&w=100&h=100&q=80" alt="Admin Avatar" class="user-avatar">
                        <div class="user-info">
                            <span class="user-name">Administrator <span class="badge-admin">Admin</span></span>
                            <span class="post-time">Diposting 2 jam lalu</span>
                        </div>
                    </div>
                    <div class="post-status active">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M4.5 1a.5.5 0 0 0-.5.5v13.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1.5a.5.5 0 0 0-.5-.5h-7zM5 14V2h6v12H5z"/></svg>
                        Pinned
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="topic-title"><a href="#">Tata Tertib dan Panduan Komunitas Alumni 2025</a></h2>
                    <p class="topic-excerpt">Selamat datang di forum alumni baru! Harap membaca peraturan berikut sebelum memulai diskusi agar komunitas kita tetap kondusif dan bermanfaat bagi semua anggota...</p>
                    <div class="topic-tags">
                        <span class="tag general">Umum</span>
                        <span class="tag announcement">Penting</span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="interactions">
                        <button class="btn-interact like active">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                            <span>245</span>
                        </button>
                        <button class="btn-interact comment">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                            <span>42 Komentar</span>
                        </button>
                        <span class="view-count">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            1.2k View
                        </span>
                    </div>
                    <button class="btn-bookmark" title="Simpan Topik">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                    </button>
                </div>
            </article>

            <article class="discussion-card">
                <div class="card-header">
                    <div class="user-meta">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=facearea&facepad=2&w=100&h=100&q=80" alt="User Avatar" class="user-avatar">
                        <div class="user-info">
                            <span class="user-name">Sarah Amalia</span>
                            <span class="post-time">45 menit yang lalu</span>
                        </div>
                    </div>
                    <div class="card-options">
                        <button class="btn-dots">•••</button>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="topic-title"><a href="#">Sharing pengalaman interview user di Tokopedia?</a></h2>
                    <p class="topic-excerpt">Halo teman-teman alumni, ada yang baru-baru ini proses rekrutmen di Tokopedia untuk posisi Software Engineer? Boleh share kisi-kisi teknisnya ya.</p>
                    
                    <div class="topic-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Discussion Image">
                    </div>

                    <div class="topic-tags">
                        <span class="tag interview">Tips Interview</span>
                        <span class="tag career">Karier</span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="interactions">
                        <button class="btn-interact like">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                            <span>12</span>
                        </button>
                        <button class="btn-interact comment">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                            <span>8 Komentar</span>
                        </button>
                    </div>
                    <button class="btn-bookmark">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                    </button>
                </div>
            </article>

            <article class="discussion-card locked">
                <div class="card-header">
                    <div class="user-meta">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=facearea&facepad=2&w=100&h=100&q=80" alt="User Avatar" class="user-avatar">
                        <div class="user-info">
                            <span class="user-name">John Doe</span>
                            <span class="post-time">1 hari lalu</span>
                        </div>
                    </div>
                    <div class="post-status locked">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C9.243 2 7 4.243 7 7v3H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7c0-2.757-2.243-5-5-5zm-3 5c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7zm9 13H6v-8h12v8z"/></svg>
                        Dikunci
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="topic-title"><a href="#">Info Lowongan MT Telkomsel Batch 5</a></h2>
                    <p class="topic-excerpt">Lowongan sudah ditutup per hari ini. Terima kasih atas antusiasme teman-teman semua.</p>
                    <div class="topic-tags">
                        <span class="tag job">Lowongan Kerja</span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="interactions">
                        <button class="btn-interact like">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                            <span>56</span>
                        </button>
                        <button class="btn-interact comment" disabled>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18.34 11.66L14 16h-4l4.34-4.34"/><line x1="2" y1="2" x2="22" y2="22"/><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8"/></svg>
                            <span>Komentar Ditutup</span>
                        </button>
                    </div>
                </div>
            </article>

            <div class="pagination">
                <button class="page-btn prev" disabled>Previous</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn next">Next</button>
            </div>
        </main>

        <aside class="forum-sidebar-right">
            <div class="sidebar-widget">
                <h3 class="widget-title">Top Contributors 🏆</h3>
                <ul class="contributor-list">
                    <li class="contributor-item">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=facearea&facepad=2&w=100&h=100&q=80" alt="User">
                        <div class="contributor-info">
                            <span class="name">Ahmad Zaky</span>
                            <span class="score">⭐ 1,204 Poin</span>
                        </div>
                    </li>
                    <li class="contributor-item">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=facearea&facepad=2&w=100&h=100&q=80" alt="User">
                        <div class="contributor-info">
                            <span class="name">Dina Wulandari</span>
                            <span class="score">⭐ 980 Poin</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Trending Now 📈</h3>
                <ul class="trending-list">
                    <li>
                        <a href="#" class="trending-link">
                            <span class="number">1</span>
                            Gaji fresh graduate IT 2025?
                        </a>
                        <span class="meta">150 replies</span>
                    </li>
                    <li>
                        <a href="#" class="trending-link">
                            <span class="number">2</span>
                            Reuni Akbar: Vote Lokasi
                        </a>
                        <span class="meta">89 replies</span>
                    </li>
                    <li>
                        <a href="#" class="trending-link">
                            <span class="number">3</span>
                            Bootcamp vs Kuliah S2
                        </a>
                        <span class="meta">64 replies</span>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</div>

<div id="createModal" class="modal-overlay">
    <div class="modal-container">
        <div class="modal-header">
            <h2>Buat Diskusi Baru</h2>
            <button class="close-modal" onclick="closeModal()">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Judul Topik</label>
                <input type="text" placeholder="Tulis judul yang menarik..." class="form-input">
            </div>
            
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-input">
                    <option>Pilih Kategori...</option>
                    <option>Karier</option>
                    <option>Diskusi Alumni</option>
                </select>
            </div>

            <div class="form-group">
                <label>Isi Diskusi</label>
                <div class="rich-text-editor">
                    <div class="rte-toolbar">
                        <button type="button"><b>B</b></button>
                        <button type="button"><i>I</i></button>
                        <button type="button"><u>U</u></button>
                        <button type="button">🔗</button>
                        <button type="button">📷</button>
                        <button type="button">List</button>
                    </div>
                    <textarea placeholder="Ceritakan detail diskusimu di sini..." rows="6"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label>Tags</label>
                <input type="text" placeholder="Contoh: #interview, #gaji (pisahkan koma)" class="form-input">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Batal</button>
            <button class="btn-submit">Posting Diskusi</button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('createModal').style.display = 'flex';
    }
    function closeModal() {
        document.getElementById('createModal').style.display = 'none';
    }
    window.onclick = function(event) {
        if (event.target == document.getElementById('createModal')) {
            closeModal();
        }
    }
</script>

<style>
    /* VARIABLES & RESET */
    :root {
        --primary: #10b981;
        --primary-dark: #059669;
        --bg-light: #f9fafb;
        --white: #ffffff;
        --text-dark: #1f2937;
        --text-gray: #6b7280;
        --border: #e5e7eb;
    }

    /* PAGE HEADER */
    .page-header {
        position: relative;
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        padding: 140px 20px 80px;
        margin-top: -100px;
        padding-top: 230px;
        margin-bottom: 0;
        z-index: 1;
    }

    .page-header-overlay {
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
        z-index: 2;
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

    /* FORUM LAYOUT GRID */
    .forum-layout {
        background: var(--bg-light);
        min-height: 100vh;
        padding-bottom: 80px;
        padding-top: 60px; /* JARAK DARI HEADER */
        position: relative;
        z-index: 2;
    }

    /* TITLE WRAPPER */
    .forum-title-wrapper {
        max-width: 1300px;
        margin: 0 auto 30px; /* Margin bottom memberi jarak ke grid */
        padding: 0 20px;
    }

    .forum-section-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
    }

    .forum-container {
        max-width: 1300px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 260px 1fr 300px;
        gap: 24px;
        padding: 0 20px;
    }

    /* SIDEBAR STYLES */
    .sidebar-widget {
        background: white;
        border-radius: 16px;
        padding: 20px;
        border: 1px solid var(--border);
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        margin-bottom: 24px;
        height: fit-content;
    }

    .create-topic-btn {
        width: 100%;
        background: var(--primary);
        color: white;
        border: none;
        padding: 12px;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .create-topic-btn:hover { background: var(--primary-dark); transform: translateY(-2px); }

    .widget-title {
        font-size: 0.85rem;
        font-weight: 700;
        color: #9ca3af;
        margin-bottom: 16px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* NAV & CATEGORY */
    .nav-list, .category-list { list-style: none; padding: 0; margin: 0; }
    .nav-item a, .cat-link {
        display: flex; align-items: center; padding: 10px 12px; color: var(--text-dark);
        text-decoration: none; border-radius: 8px; font-weight: 500; transition: 0.2s; margin-bottom: 4px; font-size: 0.95rem;
    }
    .nav-item.active a, .nav-item a:hover, .cat-link:hover { background: #ecfdf5; color: var(--primary); }
    .nav-item .icon { margin-right: 12px; font-size: 1.1rem; }
    .cat-dot { width: 8px; height: 8px; border-radius: 50%; margin-right: 12px; }
    .cat-dot.career { background: #3b82f6; } .cat-dot.job { background: #ef4444; }
    .cat-dot.alumni { background: #f59e0b; } .cat-dot.interview { background: #10b981; }
    .cat-dot.event { background: #8b5cf6; } .cat-dot.general { background: #6b7280; }
    .count { margin-left: auto; background: #f3f4f6; padding: 2px 8px; border-radius: 10px; font-size: 0.75rem; color: #9ca3af; }

    /* MAIN FEED AREA */
    .forum-controls {
        display: flex; gap: 16px; margin-bottom: 20px; background: white; padding: 8px;
        border-radius: 50px; border: 1px solid var(--border); box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }
    .search-bar { flex: 1; position: relative; }
    .search-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #9ca3af; }
    .search-bar input { width: 100%; padding: 10px 16px 10px 40px; border: none; outline: none; border-radius: 50px; font-size: 0.95rem; background: transparent; }
    .sort-wrapper select { padding: 10px 20px; border-radius: 50px; border: none; background: #f3f4f6; cursor: pointer; outline: none; font-weight: 600; color: #4b5563; font-size: 0.9rem; height: 100%; }

    /* DISCUSSION CARDS */
    .discussion-card {
        background: white; border-radius: 16px; border: 1px solid var(--border); padding: 24px;
        margin-bottom: 20px; transition: transform 0.2s; box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .discussion-card:hover { transform: translateY(-2px); border-color: var(--primary); }
    .discussion-card.pinned { border-top: 3px solid var(--primary); background: #fafffc; }
    .discussion-card.locked { opacity: 0.85; background: #fdfdfd; }

    .card-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; }
    .user-meta { display: flex; align-items: center; gap: 12px; }
    .user-avatar { width: 42px; height: 42px; border-radius: 50%; object-fit: cover; }
    .user-info { display: flex; flex-direction: column; line-height: 1.2; }
    .user-name { font-weight: 700; color: var(--text-dark); font-size: 0.95rem; }
    .badge-admin { background: #10b981; color: white; font-size: 0.65rem; padding: 2px 6px; border-radius: 4px; margin-left: 4px; vertical-align: middle; }
    .post-time { font-size: 0.75rem; color: #9ca3af; margin-top: 2px; }
    .post-status { font-size: 0.75rem; font-weight: 700; display: flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 50px; }
    .post-status.active { color: #047857; background: #d1fae5; }
    .post-status.locked { color: #b91c1c; background: #fee2e2; }

    .topic-title { margin: 0 0 8px; font-size: 1.25rem; line-height: 1.4; }
    .topic-title a { color: var(--text-dark); text-decoration: none; transition: 0.2s; }
    .topic-title a:hover { color: var(--primary); }
    .topic-excerpt { color: #4b5563; font-size: 0.95rem; line-height: 1.6; margin-bottom: 16px; }
    .topic-image-wrapper { margin-bottom: 16px; border-radius: 12px; overflow: hidden; max-height: 320px; }
    .topic-image-wrapper img { width: 100%; height: 100%; object-fit: cover; }
    .topic-tags { display: flex; gap: 8px; margin-bottom: 20px; flex-wrap: wrap; }
    .tag { padding: 4px 12px; background: #f3f4f6; color: #6b7280; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
    .tag.interview { color: #059669; background: #d1fae5; }
    .tag.job { color: #dc2626; background: #fee2e2; }

    .card-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 16px; border-top: 1px solid #f3f4f6; }
    .interactions { display: flex; gap: 16px; align-items: center; }
    .btn-interact { background: none; border: none; display: flex; align-items: center; gap: 6px; color: #6b7280; font-weight: 600; font-size: 0.85rem; cursor: pointer; transition: 0.2s; }
    .btn-interact:hover { color: var(--primary); }
    .btn-interact.like.active { color: #ef4444; }
    .view-count { font-size: 0.8rem; color: #9ca3af; display: flex; align-items: center; gap: 4px; margin-left: 8px; }
    .btn-bookmark, .btn-dots { background: none; border: none; color: #9ca3af; cursor: pointer; padding: 4px; border-radius: 4px; }
    .btn-bookmark:hover { color: var(--primary); background: #f0fdf4; }

    /* CONTRIBUTORS & TRENDING */
    .contributor-item { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid #f3f4f6; }
    .contributor-item:last-child { border: none; margin: 0; padding: 0; }
    .contributor-item img { width: 36px; height: 36px; border-radius: 50%; }
    .contributor-info .name { font-weight: 600; font-size: 0.9rem; display: block; }
    .contributor-info .score { font-size: 0.75rem; color: #f59e0b; font-weight: 600; }
    .trending-list { list-style: none; padding: 0; }
    .trending-list li { margin-bottom: 16px; }
    .trending-link { display: block; color: var(--text-dark); text-decoration: none; font-weight: 600; font-size: 0.9rem; line-height: 1.4; margin-bottom: 2px; }
    .trending-link:hover { color: var(--primary); }
    .trending-link .number { color: #d1d5db; font-weight: 900; margin-right: 4px; }
    .trending-list .meta { font-size: 0.75rem; color: #9ca3af; margin-left: 14px; }

    /* MODAL */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center; backdrop-filter: blur(4px); }
    .modal-container { background: white; width: 90%; max-width: 600px; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); animation: slideUp 0.3s ease; }
    @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    .modal-header { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .modal-header h2 { font-size: 1.2rem; font-weight: 700; margin: 0; }
    .close-modal { background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #9ca3af; }
    .modal-body { padding: 24px; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-weight: 600; margin-bottom: 8px; font-size: 0.9rem; }
    .form-input { width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 8px; font-size: 0.95rem; outline: none; }
    .form-input:focus { border-color: var(--primary); }
    .rich-text-editor { border: 1px solid var(--border); border-radius: 8px; overflow: hidden; }
    .rte-toolbar { background: #f9fafb; padding: 8px; border-bottom: 1px solid var(--border); display: flex; gap: 4px; }
    .rte-toolbar button { background: white; border: 1px solid #e5e7eb; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 0.8rem; }
    .rich-text-editor textarea { width: 100%; border: none; padding: 16px; outline: none; resize: vertical; font-family: inherit; font-size: 0.95rem; }
    .modal-footer { padding: 16px 24px; background: #f9fafb; display: flex; justify-content: flex-end; gap: 12px; border-top: 1px solid var(--border); border-radius: 0 0 20px 20px; }
    .btn-cancel { padding: 10px 20px; background: white; border: 1px solid var(--border); border-radius: 8px; cursor: pointer; font-weight: 600; }
    .btn-submit { padding: 10px 20px; background: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; }

    /* PAGINATION */
    .pagination { display: flex; justify-content: center; gap: 8px; margin-top: 40px; }
    .page-btn { padding: 8px 16px; border: 1px solid var(--border); background: white; border-radius: 8px; cursor: pointer; font-weight: 600; color: #6b7280; }
    .page-btn.active { background: var(--primary); color: white; border-color: var(--primary); }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .forum-container { grid-template-columns: 240px 1fr; }
        .forum-sidebar-right { display: none; }
    }
    @media (max-width: 768px) {
        .forum-container { grid-template-columns: 1fr; margin-top: 0; }
        .forum-sidebar-left { display: none; }
        .page-header { padding: 100px 20px 40px; }
        .page-title { font-size: 2rem; }
    }
</style>
@endsection