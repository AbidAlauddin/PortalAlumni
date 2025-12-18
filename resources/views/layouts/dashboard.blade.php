<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Company Dashboard' }}</title>
    
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    
    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: { 50: '#ecfdf5', 500: '#10b981', 600: '#059669' }
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>

    {{-- CSS MANUAL (LENGKAP) --}}
    <style>
        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --secondary: #ecfdf5;
            --text-main: #1f2937;
            --text-sub: #6b7280;
            --bg-light: #f9fafb;
            --white: #ffffff;
        }

        /* Reset Dasar */
        body { background-color: var(--bg-light); color: var(--text-main); font-family: 'Inter', sans-serif; }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }

        .dashboard-container { display: flex; min-height: 100vh; }

        /* --- SIDEBAR STYLES --- */
        .sidebar {
            width: 280px;
            background: var(--white);
            border-right: 1px solid #e5e7eb;
            position: fixed;
            height: 100vh;
            padding: 24px;
            display: flex;
            flex-direction: column;
            z-index: 50;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .logo-area { display: flex; align-items: center; gap: 12px; margin-bottom: 40px; padding-left: 12px; }
        .logo-box { width: 40px; height: 40px; background: var(--primary); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 800; }
        .logo-text { font-size: 1.25rem; font-weight: 800; color: var(--text-main); }
        
        .nav-links { flex: 1; display: flex; flex-direction: column; gap: 8px; }
        
        /* CSS INI YANG KEMARIN HILANG (Penyebab ikon raksasa) */
        .nav-item { display: flex; align-items: center; gap: 12px; padding: 14px 16px; border-radius: 12px; color: var(--text-sub); font-weight: 500; transition: all 0.3s ease; }
        .nav-item:hover, .nav-item.active { background: var(--secondary); color: var(--primary-dark); }
        .nav-item svg { width: 22px !important; height: 22px !important; } /* Force size */

        .sidebar-footer { border-top: 1px solid #e5e7eb; padding-top: 20px; margin-top: 20px; }

        /* --- MAIN CONTENT --- */
        .main-content {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
            width: calc(100% - 280px); 
        }

        /* --- NAVBAR STYLES --- */
        .topbar {
            height: 80px;
            background: var(--white);
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 40;
        }
        
        .page-title { font-size: 1.5rem; font-weight: 700; }
        
        /* CSS INI JUGA PENTING UNTUK PROFIL */
        .user-profile { display: flex; align-items: center; gap: 16px; }
        .notif-btn { position: relative; background: white; border: 1px solid #e5e7eb; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--text-sub); }
        .badge-dot { position: absolute; top: 8px; right: 10px; width: 8px; height: 8px; background: #ef4444; border-radius: 50%; border: 1px solid white; }
        .profile-info { text-align: right; }
        .profile-name { font-weight: 600; font-size: 0.95rem; }
        .profile-role { font-size: 0.8rem; color: var(--text-sub); }
        
        /* Fix Gambar Profil Raksasa */
        .profile-img { 
            width: 45px !important; 
            height: 45px !important; 
            border-radius: 50%; 
            object-fit: cover; 
            border: 2px solid var(--secondary); 
            display: block;
        }

        /* Content Wrapper */
        .content-wrapper { padding: 30px 40px; animation: fadeIn 0.5s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 1024px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; width: 100%; }
            .sidebar.open { transform: translateX(0); }
        }
    </style>
    
    @livewireStyles
    @stack('styles')
</head>
<body>

<div class="dashboard-container" x-data="{ sidebarOpen: false }">
    
    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    <main class="main-content">
        
        {{-- Navbar --}}
        @include('layouts.partials.navbar-dashboard')

        <div class="content-wrapper">
            @if(isset($slot))
                {{ $slot }}
            @else
                @yield('content')
            @endif
        </div>

    </main>
</div>

@livewireScripts
@stack('scripts')

</body>
</html>