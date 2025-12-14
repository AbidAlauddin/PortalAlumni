@extends('layouts.auth')

@section('content')
<div class="auth-page-wrapper">
    <div class="split-screen-container">
        
        <div class="left-pane">
            
            <div class="left-pane-content-wrapper">
                
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
                        <h1 class="auth-title">{{ __('Partner With Us') }}</h1>
                        <p class="auth-subtitle">{{ __('Create a company profile to post jobs and find talent.') }}</p>
                    </div>

                    <x-auth-session-status class="mb-6 text-center" :status="session('status')" />

                    <form method="POST" action="{{ route('register.company.store') }}" class="auth-form" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="role" value="company">

                        <div class="form-group">
                            <flux:input name="name" :label="__('Company Name')" :value="old('name')" type="text" required autofocus placeholder="e.g. TechCorp Indonesia" />
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <flux:input name="email" :label="__('Business Email')" :value="old('email')" type="email" required placeholder="hr@company.com" />
                            </div>
                            <div class="form-group">
                                <flux:input name="phone" :label="__('Phone Number')" :value="old('phone')" type="tel" required placeholder="+62 812..." />
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <flux:input name="website" :label="__('Website URL')" :value="old('website')" type="url" placeholder="https://company.com" />
                            </div>
                            <div class="form-group">
                                <flux:input name="industry" :label="__('Industry')" :value="old('industry')" type="text" required placeholder="e.g. Fintech, Retail" />
                            </div>
                        </div>

                        <div class="form-group">
                            <flux:input name="logo" :label="__('Company Logo')" type="file" accept="image/*" class="file-input" />
                            <span class="input-hint">Recommended: Square image (PNG/JPG), max 2MB.</span>
                        </div>

                        <div class="form-group">
                            <label class="custom-label">{{ __('Office Address') }}</label>
                            <textarea name="address" class="custom-textarea" rows="2" placeholder="Full office address..." required>{{ old('address') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="custom-label">{{ __('Company Description') }}</label>
                            <textarea name="description" class="custom-textarea" rows="4" placeholder="Tell us about your company culture and vision..." required>{{ old('description') }}</textarea>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <flux:input name="password" :label="__('Password')" type="password" required placeholder="Create password" viewable />
                            </div>
                            <div class="form-group">
                                <flux:input name="password_confirmation" :label="__('Confirm')" type="password" required placeholder="Repeat password" viewable />
                            </div>
                        </div>

                        <div class="form-actions mt-6">
                            <flux:button type="submit" variant="primary" class="auth-btn w-full">
                                {{ __('Register Company') }}
                            </flux:button>
                        </div>
                    </form>

                    <div class="hiring-section">
                        <div class="hiring-divider">
                            <span class="divider-text">Looking for a job?</span>
                        </div>
                        
                        <a href="{{ route('register') }}" class="company-btn-card">
                            <div class="icon-wrapper user-icon-bg">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="text-wrapper">
                                <span class="btn-title">Register as a Job Seeker</span>
                                <span class="btn-subtitle">Find jobs & build career</span>
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
                    
                    <div style="height: 100px;"></div>

                </div>
            </div> </div>

        <div class="right-pane">
            <div class="pane-overlay"></div>
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Corporate" class="auth-bg-image">
            <div class="image-text-content">
                <div class="quote-box">
                    <h2 class="quote-title">Hire Top Talent</h2>
                    <p class="quote-text">"Finding the right talent used to be a struggle. Since joining JobPortal, we've hired 10+ amazing developers."</p>
                    <div class="quote-author">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="CEO">
                        <div>
                            <strong>James Wilson</strong>
                            <span>CEO at TechFlow</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* UTILITIES */
    .auth-wrapper { display: flex; min-height: 100vh; width: 100%; background: white; font-family: 'Inter', sans-serif; }
    .split-screen-container { display: flex; width: 100%; min-height: 100vh; }

    /* --- LEFT PANE CONFIGURATION --- */
    .left-pane {
        width: 50%;
        height: 100vh; /* Fixed height agar scrollbar muncul di sini */
        overflow-y: auto; /* Scroll vertikal aktif */
        background: #ffffff;
        display: block; /* Penting: Jangan gunakan flex di sini */
        position: relative;
    }

    /* Wrapper Konten: Mengatur posisi tengah dan padding */
    .left-pane-content-wrapper {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center; /* Center Horizontal */
        justify-content: center; /* Center Vertikal (jika layar tinggi) */
        
        /* Padding atas dan samping. Padding bawah ditangani Spacer div */
        padding: 100px 40px 0px 40px; 
    }

    /* Custom Scrollbar */
    .left-pane::-webkit-scrollbar { 
        width: 6px; 
    }

    .left-pane::-webkit-scrollbar-thumb { 
        background-color: #e5e7eb; 
        border-radius: 10px; 
    }

    .auth-content {
        width: 100%;
        max-width: 520px;
    }

    /* Header Styles */
    .auth-header { margin-bottom: 48px; }
    .brand-logo { display: flex; align-items: center; gap: 12px; margin-bottom: 32px; text-decoration: none; }
    .logo-icon { width: 40px; height: 40px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; }
    .brand-name { font-size: 1.5rem; font-weight: 800; color: #1f2937; letter-spacing: -0.5px; }
    .auth-title { font-size: 2.25rem; font-weight: 800; color: #1f2937; margin-bottom: 12px; line-height: 1.2; }
    .auth-subtitle { color: #6b7280; font-size: 1.05rem; line-height: 1.6; }

    /* Form Styles */
    .auth-form { display: flex; flex-direction: column; gap: 24px; }
    .form-group { display: flex; flex-direction: column; gap: 8px; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

    .custom-label { font-size: 0.9rem; font-weight: 600; color: #374151; margin-bottom: 4px; }
    
    .custom-textarea {
        width: 100%; 
        padding: 12px 16px; 
        border: 1px solid #e5e7eb; 
        border-radius: 8px; 
        font-family: inherit; 
        font-size: 0.95rem; 
        outline: none; 
        transition: border-color 0.2s, box-shadow 0.2s; 
        resize: vertical; 
        line-height: 1.5;
    }
    .custom-textarea:focus { 
        border-color: #10b981; 
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); 
    }

    .input-hint { 
        font-size: 0.8rem; 
        color: #9ca3af; 
        margin-top: 4px; }

    .auth-btn { 
        width: 100%; 
        padding: 14px; 
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important; 
        color: white !important; 
        font-weight: 600 !important; 
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

    /* Hiring/User Section Styles */
    .hiring-section { margin-top: 40px; margin-bottom: 30px; }
    .hiring-divider { display: flex; align-items: center; text-align: center; margin-bottom: 24px; color: #9ca3af; font-size: 0.9rem; }
    .hiring-divider::before, .hiring-divider::after { content: ''; flex: 1; border-bottom: 1px solid #e5e7eb; }
    .divider-text { padding: 0 16px; font-weight: 500; background: #fff; }

    .company-btn-card { display: flex; align-items: center; padding: 18px 24px; background-color: white; border: 1px solid #e5e7eb; border-radius: 16px; text-decoration: none; transition: all 0.2s ease; gap: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.02); }
    .company-btn-card:hover { border-color: #10b981; background-color: #f0fdf4; transform: translateY(-3px); box-shadow: 0 10px 20px rgba(16, 185, 129, 0.1); }
    .icon-wrapper { width: 48px; height: 48px; background: #f3f4f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #4b5563; transition: all 0.2s; flex-shrink: 0; }
    .company-btn-card:hover .icon-wrapper { background: #10b981; color: white; }
    
    .text-wrapper { flex: 1; display: flex; flex-direction: column; }
    .btn-title { font-weight: 700; color: #1f2937; font-size: 1rem; display: block; margin-bottom: 2px; }
    .btn-subtitle { font-size: 0.85rem; color: #6b7280; display: block; }
    .arrow-icon { color: #9ca3af; transition: transform 0.2s; }
    .company-btn-card:hover .arrow-icon { color: #10b981; transform: translateX(4px); }

    /* Footer Links */
    .auth-footer { margin-top: 30px; text-align: center; font-size: 0.95rem; }
    .footer-text { color: #6b7280; }
    .footer-link { color: #10b981 !important; font-weight: 700; margin-left: 6px; text-decoration: none; transition: color 0.2s; }
    .footer-link:hover { color: #059669; }

    /* Right Pane */
    .right-pane { width: 50%; position: sticky; top: 0; height: 100vh; background: #f3f4f6; overflow: hidden; display: flex; align-items: flex-end; padding: 60px; border-bottom-left-radius: 40px; }
    .auth-bg-image { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
    .image-overlay { 
        position: absolute; 
        inset: 0; 
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9) 0%, rgba(5, 150, 105, 0.85) 50%, rgba(4, 120, 87, 0.9) 100%); 
        z-index: 1; 
    }
    
    .image-text-content { position: relative; z-index: 10; width: 100%; color: white; }
    .quote-box { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 40px; border-radius: 24px; border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
    .quote-title { font-size: 2rem; font-weight: 800; margin-bottom: 16px; }
    .quote-text { font-size: 1.15rem; line-height: 1.6; opacity: 0.95; margin-bottom: 24px; font-style: italic; }
    .quote-author { display: flex; align-items: center; gap: 16px; }
    .author-avatar, .quote-author img { width: 56px; height: 56px; border-radius: 50%; border: 3px solid rgba(255,255,255,0.3); object-fit: cover; }
    .author-info .name { display: block; font-weight: 700; font-size: 1.1rem; }
    .author-info .role { font-size: 0.9rem; opacity: 0.8; }

    /* Mobile Responsive */
    @media (max-width: 1024px) {
        .left-pane { width: 100%; height: auto; }
        .left-pane-content-wrapper { padding: 60px 20px 0 20px; }
        .right-pane { display: none; }
        .form-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection