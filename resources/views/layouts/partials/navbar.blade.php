<!-- NAVBAR COMPONENT (navbar.blade.php) -->
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
                    <a href="/login" class="auth-btn login-btn">Login</a>
                    <a href="/register" class="auth-btn signup-btn">Sign Up</a>
                </li>
            </ul>
        </div>

        <div class="auth-buttons">
            <a href="/login" class="auth-btn login-btn">Login</a>
            <a href="/register" class="auth-btn signup-btn">Sign Up</a>
        </div>

        <button class="menu-toggle" id="menuToggle">☰</button>
    </div>
</nav>

<style>
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
    }

    .nav-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
    }

    .logo-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo-text {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1f2937;
    }

    .nav-center {
        display: flex;
        align-items: center;
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 30px;
        margin: 0;
        padding: 0;
    }

    .nav-links a {
        color: #6b7280;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-links a:hover,
    .nav-links a.active {
        color: #10b981;
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 50%;
        background: #10b981;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-links a.active::after {
        width: 100%;
    }

    .auth-buttons {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .auth-btn {
        padding: 10px 24px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .login-btn {
        color: #1f2937;
        border: 1px solid #e5e7eb;
    }

    .login-btn:hover {
        border-color: #10b981;
        color: #10b981;
    }

    .signup-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff;
        border: none;
    }

    .signup-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
    }

    .mobile-auth-buttons {
        display: none;
    }

    .menu-toggle {
        display: none;
        background: none;
        border: none;
        color: #1f2937;
        font-size: 1.5rem;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .navbar {
            top: 15px;
            padding: 10px 20px;
            width: calc(100% - 30px);
        }

        .nav-links {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.98);
            flex-direction: column;
            padding: 20px;
            border-radius: 20px;
            margin-top: 10px;
            gap: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .nav-links.active {
            display: flex;
        }

        .auth-buttons {
            display: none;
        }

        .mobile-auth-buttons {
            display: flex !important;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }

        .mobile-auth-buttons a {
            text-align: center;
        }

        .menu-toggle {
            display: block;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const navLinksContainer = document.getElementById('navLinks');

        if (menuToggle && navLinksContainer) {
            menuToggle.addEventListener('click', () => {
                navLinksContainer.classList.toggle('active');
            });

            const navLinks = document.querySelectorAll('.nav-links a');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    navLinksContainer.classList.remove('active');
                });
            });

            document.addEventListener('click', (e) => {
                if (!menuToggle.contains(e.target) && !navLinksContainer.contains(e.target)) {
                    navLinksContainer.classList.remove('active');
                }
            });
        }

        // Navbar scroll effect
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