@extends('layouts.auth')

@section('content')
<div class="split-screen-container">
    
    <div class="left-pane">
        <div class="auth-content">
            <div class="auth-header">
                <a href="{{ route('home') }}" class="brand-logo">
                    <div class="logo-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 7h-9m3 10h-5m9-5h-8M4 17h16M4 7h2m-2 5h2m-2 5h2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span class="logo-text">JobPortal</span>
                </a>
                <h1 class="page-title">{{ __('Welcome Back') }}</h1>
                <p class="page-subtitle">{{ __('Please enter your details to sign in') }}</p>
            </div>

            <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login.store') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <flux:input
                        name="email"
                        :label="__('Email address')"
                        :value="old('email')"
                        type="email"
                        required
                        autofocus
                        placeholder="name@company.com"
                    />
                </div>

                <div class="form-group relative">
                    <flux:input
                        name="password"
                        :label="__('Password')"
                        type="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        viewable
                    />
                    @if (Route::has('password.request'))
                        <div class="forgot-wrapper">
                            <flux:link :href="route('password.request')" class="forgot-link">
                                {{ __('Forgot password?') }}
                            </flux:link>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <flux:checkbox name="remember" :label="__('Remember me for 30 days')" />
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-btn">
                        {{ __('Sign in') }}
                    </button>
                </div>
            </form>

            <div class="auth-footer">
                <p>{{ __('Don\'t have an account?') }} <a href="{{ route('register') }}" class="register-link">{{ __('Sign up') }}</a></p>
            </div>
        </div>
    </div>

    <div class="right-pane">
        <div class="pane-overlay"></div>
        <img src="/images/rumil.png" alt="Office" class="bg-image">
        
        <div class="pane-content">
            <div class="quote-card">
                <div class="stars">★★★★★</div>
                <p class="quote-text">"JobPortal helped me find the perfect role in just two weeks. The matching algorithm is incredibly accurate!"</p>
                <div class="quote-author">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="User">
                    <div>
                        <strong>Sarah Jenkins</strong>
                        <span>UI/UX Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS Layout Split Screen */
    .split-screen-container {
        display: flex;
        min-height: 100vh;
        width: 100%;
        background: #fff;
        overflow: hidden; /* Mencegah scrollbar ganda */
    }

    /* LEFT PANE (FORM) */
    .left-pane {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        background: #ffffff;
        position: relative;
        z-index: 10; /* Pastikan form di atas background jika tumpuk di mobile */
    }

    .auth-content {
        width: 100%;
        max-width: 440px;
    }

    /* Header Styles */
    .brand-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 40px;
        text-decoration: none;
    }

    .logo-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .logo-text {
        font-size: 1.5rem;
        font-weight: 800;
        color: #1f2937;
        letter-spacing: -0.5px;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 10px;
        line-height: 1.2;
    }

    .page-subtitle {
        color: #6b7280;
        font-size: 1rem;
        margin-bottom: 32px;
    }

    /* Form Styles */
    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .forgot-wrapper {
        display: flex;
        justify-content: flex-end;
        margin-top: 8px;
    }

    .forgot-link {
        font-size: 0.875rem;
        color: #10b981 !important;
        font-weight: 600;
        text-decoration: none;
    }

    /* Button Style */
    .submit-btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        font-weight: 600;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        font-size: 1rem;
        margin-top: 10px;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    /* Footer */
    .auth-footer {
        margin-top: 32px;
        text-align: center;
        font-size: 0.95rem;
        color: #6b7280;
    }

    .register-link {
        color: #10b981;
        font-weight: 700;
        text-decoration: none;
        transition: color 0.2s;
    }
    
    .register-link:hover {
        color: #059669;
    }

    /* RIGHT PANE (IMAGE) */
    .right-pane {
        width: 50%;
        position: relative;
        background: #f3f4f6;
        display: flex;
        align-items: flex-end;
        padding: 60px;
        overflow: hidden;
    }

    .bg-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .pane-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9) 0%, rgba(5, 150, 105, 0.85) 50%, rgba(4, 120, 87, 0.9) 100%);
        z-index: 1;
    }

    .pane-content {
        position: relative;
        z-index: 10;
        width: 100%;
    }

    .quote-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        padding: 30px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .stars { color: #fbbf24; margin-bottom: 12px; font-size: 1.2rem; letter-spacing: 2px; }
    .quote-text { font-size: 1.15rem; line-height: 1.6; margin-bottom: 24px; font-weight: 500; font-style: italic; }
    
    .quote-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .quote-author img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.5);
    }
    .quote-author strong { display: block; font-size: 1rem; }
    .quote-author span { font-size: 0.85rem; opacity: 0.9; }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .left-pane { width: 100%; padding: 30px 20px; }
        .right-pane { display: none; }
    }
</style>
@endsection