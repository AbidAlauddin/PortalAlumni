@extends('layouts.auth')

@section('content')    
<div class="auth-wrapper">
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
                        <span class="brand-name">JobPortal</span>
                    </a>
                    <h1 class="auth-title">{{ __('Create Account') }}</h1>
                    <p class="auth-subtitle">{{ __('Join us today! Enter your details below to get started.') }}</p>
                </div>

                <x-auth-session-status class="text-center mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('register.store') }}" class="auth-form">
                    @csrf
                    
                    <div class="form-group">
                        <flux:input 
                            name="name" 
                            :label="__('Full Name')" 
                            :value="old('name')" 
                            type="text" 
                            required 
                            autofocus 
                            autocomplete="name" 
                            placeholder="John Doe" 
                        />
                    </div>

                    <div class="form-group">
                        <flux:input 
                            name="email" 
                            :label="__('Email address')" 
                            :value="old('email')" 
                            type="email" 
                            required 
                            autocomplete="email" 
                            placeholder="email@example.com" 
                        />
                    </div>

                    <div class="form-group">
                        <flux:input 
                            name="password" 
                            :label="__('Password')" 
                            type="password" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Create a password" 
                            viewable 
                        />
                    </div>

                    <div class="form-group">
                        <flux:input 
                            name="password_confirmation" 
                            :label="__('Confirm password')" 
                            type="password" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Repeat password" 
                            viewable 
                        />
                    </div>

                    <div class="form-actions mt-4">
                        <flux:button type="submit" variant="primary" class="auth-btn w-full" data-test="register-user-button">
                            {{ __('Create account') }}
                        </flux:button>
                    </div>
                </form>

                <div class="hiring-section">
                    <div class="hiring-divider">
                        <span class="divider-text">Looking for talent?</span>
                    </div>
                    
                    <a href="{{ route('register.company') }}" class="company-btn-card">
                        <div class="icon-wrapper">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                        </div>
                        <div class="text-wrapper">
                            <span class="btn-title">Register as a Company</span>
                            <span class="btn-subtitle">Post jobs & hire talent</span>
                        </div>
                        <div class="arrow-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </a>
                </div>

                <div class="auth-footer">
                    <span class="footer-text">{{ __('Already have an account?') }}</span>
                    <flux:link :href="route('login')" wire:navigate class="footer-link">{{ __('Log in') }}</flux:link>
                </div>
            </div>
        </div>

        <div class="right-pane">
            <div class="pane-overlay"></div>
            <img src="images/rumil.png" alt="Team Collaboration" class="auth-bg-image">
            
            <div class="image-text-content">
                <div class="quote-box">
                    <h2 class="quote-title">Join 50K+ Job Seekers</h2>
                    <p class="quote-text">"Creating an account was the best career move I made. The opportunities here are tailored exactly to my skills."</p>
                    <div class="quote-author">
                        <span class="author-avatar">★</span>
                        <div class="author-info">
                            <span class="name">Success Story</span>
                            <span class="role">Software Engineer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* UTILITIES & LAYOUT */
    .auth-wrapper {
        display: flex;
        min-height: 100vh;
        width: 100%;
        background: white;
        font-family: 'Inter', sans-serif;
    }

    .split-screen-container {
        display: flex;
        width: 100%;
        min-height: 100vh;
    }

    /* LEFT PANE STYLES */
    .left-pane { 
        width: 50%; 
        display: flex; 
        justify-content: center; 
        padding: 160px 40px 40px 40px; 
        overflow-y: auto; 
        max-height: 100vh; 
    }

    .auth-content {
        width: 100%;
        max-width: 440px;
        padding-bottom: 40px;
    }

    /* Header */
    .auth-header { margin-bottom: 32px; }

    .brand-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 30px;
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

    .brand-name {
        font-size: 1.5rem;
        font-weight: 800;
        color: #1f2937;
        letter-spacing: -0.5px;
    }

    .auth-title {
        font-size: 2rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 8px;
        line-height: 1.2;
    }

    .auth-subtitle {
        color: #6b7280;
        font-size: 1rem;
    }

    /* Form Elements */
    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .auth-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        color: white !important;
        font-weight: 600 !important;
        padding: 14px !important;
        border-radius: 12px !important;
        border: none !important;
        transition: all 0.3s ease !important;
        font-size: 1rem !important;
        cursor: pointer;
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
    }

    .auth-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(16, 185, 129, 0.3);
    }

    /* HIRING SECTION (Style Baru) */
    .hiring-section {
        margin-top: 32px;
        margin-bottom: 24px;
    }

    .hiring-divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin-bottom: 20px;
        color: #9ca3af;
        font-size: 0.85rem;
    }
    
    .hiring-divider::before, 
    .hiring-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .divider-text {
        padding: 0 12px;
        font-weight: 500;
        background: #fff;
    }

    /* Kartu Tombol Company */
    .company-btn-card {
        display: flex;
        align-items: center;
        padding: 16px 20px;
        background-color: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        text-decoration: none;
        transition: all 0.2s ease;
        gap: 16px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }

    .company-btn-card:hover {
        border-color: #10b981;
        background-color: #f0fdf4; /* Hijau sangat muda */
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);
    }

    .icon-wrapper {
        width: 40px;
        height: 40px;
        background: #f3f4f6;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4b5563;
        transition: all 0.2s;
        flex-shrink: 0;
    }

    .company-btn-card:hover .icon-wrapper {
        background: #10b981;
        color: white;
    }

    .text-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .btn-title {
        font-weight: 700;
        color: #1f2937;
        font-size: 0.95rem;
        display: block;
    }

    .btn-subtitle {
        font-size: 0.8rem;
        color: #6b7280;
        margin-top: 2px;
        display: block;
    }

    .arrow-icon {
        color: #9ca3af;
        transition: transform 0.2s;
    }

    .company-btn-card:hover .arrow-icon {
        color: #10b981;
        transform: translateX(4px);
    }

    /* Footer Links */
    .auth-footer {
        margin-top: 20px;
        text-align: center;
        font-size: 0.95rem;
    }

    .footer-text {
        color: #6b7280;
    }

    .footer-link {
        color: #10b981 !important;
        font-weight: 700;
        margin-left: 6px;
        text-decoration: none;
    }

    /* RIGHT PANE STYLES */
    .right-pane {
        width: 50%;
        position: sticky;
        top: 0;
        height: 100vh;
        background: #f3f4f6;
        overflow: hidden;
        display: flex;
        align-items: flex-end;
        padding: 60px;
        border-bottom-left-radius: 40px;
    }

    .auth-bg-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9) 0%, rgba(5, 150, 105, 0.85) 50%, rgba(4, 120, 87, 0.9) 100%);
        z-index: 1;
    }

    .pane-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9) 0%, rgba(5, 150, 105, 0.85) 50%, rgba(4, 120, 87, 0.9) 100%);
        z-index: 1;
    }

    .image-text-content {
        position: relative;
        z-index: 10;
        color: white;
        width: 100%;
    }

    .quote-box {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 40px;
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .quote-title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 16px;
    }

    .quote-text {
        font-size: 1.1rem;
        line-height: 1.6;
        opacity: 0.9;
        margin-bottom: 24px;
        font-style: italic;
    }

    .quote-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .author-avatar {
        width: 40px;
        height: 40px;
        background: white;
        color: #10b981;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.9rem;
    }

    .author-info .name {
        display: block;
        font-weight: 700;
        font-size: 1rem;
    }

    .author-info .role {
        font-size: 0.85rem;
        opacity: 0.8;
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .auth-form-container, .left-pane { width: 100%; padding: 30px 20px; height: auto; overflow: visible; }
        .auth-image-container, .right-pane { display: none; }
        .split-screen-container { flex-direction: column; }
    }
</style>
@endsection