<nav class="navbar">
    <div class="nav-container">
        <div class="logo-container">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="20" fill="#10b981"/>
                <path d="M20 10L25 18H15L20 10Z" fill="white"/>
                <rect x="17" y="18" width="6" height="12" fill="white"/>
            </svg>
            <span class="logo-text">JobPortal</span>
        </div>
        
        <div class="nav-center">
            <ul class="nav-links" id="navLinks">
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/course" class="{{ request()->is('course*') ? 'active' : '' }}">Course</a></li>
                <li><a href="/jobseek" class="{{ request()->is('jobseek*') ? 'active' : '' }}">Job Seek</a></li>
                <li><a href="/forum" class="{{ request()->is('forum*') ? 'active' : '' }}">Forum</a></li>
                <li><a href="/news" class="{{ request()->is('news*') ? 'active' : '' }}">News</a></li>
                
                <li class="mobile-auth-buttons">
                    @guest
                        <a href="/login" class="auth-btn login-btn">Login</a>
                        <a href="/register" class="auth-btn signup-btn">Sign Up</a>
                    @endguest
                    
                    @auth
                        {{-- LOGIKA ROUTE PROFILE (MOBILE) --}}
                        @php
                            $profileRoute = match(Auth::user()->role) {
                                'company' => route('company.profile'),
                                'alumni' => route('alumni.profile'),
                                default => route('profile.edit'),
                            };
                        @endphp

                        {{-- Ubah div menjadi a href agar bisa diklik di mobile --}}
                        <a href="{{ $profileRoute }}" class="mobile-user-info" style="text-decoration: none; color: inherit;">
                            <img src="{{ Auth::user()->role == 'alumni' && Auth::user()->alumni?->profile_photo ? asset('storage/'.Auth::user()->alumni->profile_photo) : (Auth::user()->role == 'company' && Auth::user()->company?->logo ? asset('storage/'.Auth::user()->company->logo) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=10b981&color=fff') }}" alt="Profile" class="mobile-avatar">
                            <div style="display: flex; flex-direction: column;">
                                <span>{{ Auth::user()->name }}</span>
                                <span style="font-size: 0.75rem; color: #10b981;">Edit Profile</span>
                            </div>
                        </a>
                        
                        @if(in_array(Auth::user()->role, ['admin', 'company']))
                            <a href="{{ Auth::user()->role === 'admin' ? '/admin/dashboard' : route('company.dashboard') }}" class="mobile-link">Dashboard</a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" style="width: 100%;">
                            @csrf
                            <button type="submit" class="mobile-link logout-btn-mobile">Logout</button>
                        </form>
                    @endauth
                </li>
            </ul>
        </div>

        <div class="auth-buttons">
            @guest
                <a href="/login" class="auth-btn login-btn">Login</a>
                <a href="/register" class="auth-btn signup-btn">Sign Up</a>
            @endguest

            @auth
                {{-- LOGIKA ROUTE PROFILE (DESKTOP) --}}
                @php
                    $profileRoute = match(Auth::user()->role) {
                        'company' => route('company.profile'),
                        'alumni' => route('alumni.profile'),
                        default => route('profile.edit'),
                    };
                    
                    // Cek foto profil berdasarkan role
                    $avatar = 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=10b981&color=fff';
                    if(Auth::user()->role == 'alumni' && Auth::user()->alumni?->profile_photo) {
                        $avatar = asset('storage/'.Auth::user()->alumni->profile_photo);
                    } elseif(Auth::user()->role == 'company' && Auth::user()->company?->logo) {
                        $avatar = asset('storage/'.Auth::user()->company->logo);
                    }
                @endphp

                <div class="profile-dropdown-container">
                    <button class="profile-trigger" id="profileDropdownBtn">
                        <img src="{{ $avatar }}" alt="Profile" class="profile-avatar">
                        <span class="profile-name">{{ Auth::user()->name }}</span>
                        <svg class="chevron-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 9l6 6 6-6"/>
                        </svg>
                    </button>

                    <div class="dropdown-menu" id="profileDropdown">
                        <div class="dropdown-header">
                            <p class="user-email">{{ Auth::user()->email }}</p>
                            <span style="font-size: 0.7rem; color: #10b981; text-transform: uppercase; font-weight: bold;">{{ Auth::user()->role }}</span>
                        </div>
                        
                        @if(in_array(Auth::user()->role, ['admin', 'company']))
                            <a href="{{ Auth::user()->role === 'admin' ? '/admin/dashboard' : route('company.dashboard') }}" class="dropdown-item">
                                {{-- Icon Dashboard SVG --}}
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                Dashboard
                            </a>
                        @endif

                        {{-- LINK PROFILE DINAMIS --}}
                        <a href="{{ $profileRoute }}" class="dropdown-item">
                            {{-- Icon User SVG --}}
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            My Profile
                        </a>

                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                {{-- Icon Logout SVG --}}
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>

        <button class="menu-toggle" id="menuToggle">☰</button>
    </div>
</nav>

<style>
    /* ... (CSS Anda Tetap Sama, tidak perlu diubah, kecuali bagian di bawah ini jika ingin perbaikan kecil) ... */
    
    /* Tambahan agar link mobile profile terlihat rapi */
    .mobile-user-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        padding: 8px 10px;
        border-radius: 8px;
        transition: background 0.3s;
    }
    .mobile-user-info:hover {
        background-color: #f3f4f6;
    }
    
    /* ... (Sisa CSS Anda) ... */
    
    /* CSS Bawaan Anda */
    .navbar {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 50px;
        padding: 12px 30px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        z-index: 1000;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        width: max-content; 
        max-width: 90%;
    }

    .nav-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        width: 100%;
    }

    .logo-container { display: flex; align-items: center; gap: 10px; }
    .logo-text { font-size: 1.3rem; font-weight: 700; color: #1f2937; }
    .nav-center { display: flex; align-items: center; }
    .nav-links { display: flex; list-style: none; gap: 30px; margin: 0; padding: 0; }
    
    .nav-links a {
        color: #6b7280;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-links a:hover, .nav-links a.active { color: #10b981; }
    .nav-links a::after {
        content: ''; position: absolute; width: 0; height: 2px; bottom: -5px; left: 50%;
        background: #10b981; transition: all 0.3s ease; transform: translateX(-50%);
    }
    .nav-links a.active::after { width: 100%; }

    .auth-buttons { display: flex; gap: 12px; align-items: center; }
    .auth-btn {
        padding: 10px 24px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        white-space: nowrap;
    }
    .login-btn { color: #1f2937; border: 1px solid #e5e7eb; }
    .login-btn:hover { border-color: #10b981; color: #10b981; }
    .signup-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff;
        border: none;
    }
    .signup-btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3); }

    .profile-dropdown-container { position: relative; }

    .profile-trigger {
        display: flex; align-items: center; gap: 10px; background: transparent; border: none; cursor: pointer; padding: 4px 8px; border-radius: 30px; transition: background 0.2s;
    }
    .profile-trigger:hover { background: rgba(0,0,0,0.05); }

    .profile-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 2px solid #10b981; }
    .profile-name { font-weight: 600; color: #1f2937; font-size: 0.95rem; }
    .chevron-icon { color: #6b7280; transition: transform 0.3s ease; }

    .dropdown-menu {
        position: absolute; top: 120%; right: 0; width: 220px; background: white; border-radius: 20px; padding: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: 1px solid rgba(0,0,0,0.05); opacity: 0; visibility: hidden; transform: translateY(10px); transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .profile-dropdown-container.active .dropdown-menu { opacity: 1; visibility: visible; transform: translateY(0); }
    .profile-dropdown-container.active .chevron-icon { transform: rotate(180deg); }

    .dropdown-header { padding: 10px 15px; border-bottom: 1px solid #f3f4f6; margin-bottom: 5px; }
    .user-email { font-size: 0.8rem; color: #6b7280; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

    .dropdown-item {
        display: flex; align-items: center; gap: 10px; padding: 10px 15px; color: #374151; text-decoration: none; font-size: 0.9rem; border-radius: 12px; transition: all 0.2s; background: none; border: none; width: 100%; text-align: left; cursor: pointer;
    }
    .dropdown-item:hover { background-color: #f0fdf4; color: #10b981; }
    .dropdown-item.text-danger:hover { background-color: #fef2f2; color: #ef4444; }
    .dropdown-divider { height: 1px; background: #f3f4f6; margin: 5px 0; }

    .mobile-auth-buttons { display: none; }
    .menu-toggle { display: none; background: none; border: none; font-size: 1.5rem; cursor: pointer; }

    @media (max-width: 900px) {
        .navbar { top: 15px; padding: 10px 20px; width: calc(100% - 30px); max-width: none; }
        .nav-links { display: none; position: absolute; top: 100%; left: 0; right: 0; background: rgba(255, 255, 255, 0.98); flex-direction: column; padding: 20px; border-radius: 20px; margin-top: 15px; gap: 15px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); }
        .nav-links.active { display: flex; }
        .auth-buttons { display: none; } 
        .mobile-auth-buttons { display: flex !important; flex-direction: column; gap: 10px; width: 100%; padding-top: 15px; border-top: 1px solid #f3f4f6; }
        .mobile-user-info { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; padding: 0 10px; }
        .mobile-avatar { width: 32px; height: 32px; border-radius: 50%; }
        .mobile-link { text-align: center; color: #4b5563; text-decoration: none; padding: 8px; border-radius: 8px; }
        .logout-btn-mobile { background: #fee2e2; color: #ef4444; border: none; width: 100%; font-weight: 600; }
        .mobile-auth-buttons a.auth-btn { text-align: center; }
        .menu-toggle { display: block; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const navLinksContainer = document.getElementById('navLinks');

        if (menuToggle && navLinksContainer) {
            menuToggle.addEventListener('click', (e) => {
                e.stopPropagation(); 
                navLinksContainer.classList.toggle('active');
            });

            const navLinks = document.querySelectorAll('.nav-links a:not(.auth-btn)');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    navLinksContainer.classList.remove('active');
                });
            });
        }

        const profileBtn = document.getElementById('profileDropdownBtn');
        const profileContainer = document.querySelector('.profile-dropdown-container');

        if (profileBtn) {
            profileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profileContainer.classList.toggle('active');
            });
        }

        document.addEventListener('click', (e) => {
            if (navLinksContainer && navLinksContainer.classList.contains('active') && 
                !navLinksContainer.contains(e.target) && 
                !menuToggle.contains(e.target)) {
                navLinksContainer.classList.remove('active');
            }

            if (profileContainer && profileContainer.classList.contains('active') && 
                !profileContainer.contains(e.target)) {
                profileContainer.classList.remove('active');
            }
        });

        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.15)';
                } else {
                    navbar.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.08)';
                }
            }
        });
    });
</script>