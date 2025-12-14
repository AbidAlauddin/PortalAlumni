<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\Auth\CompanyRegisterController;


Route::get('/', function () {
    return view('home');
})->name('home');

// Course
Route::get('/course', function () {
    return view('alumni.course');
})->name('course');

// Job Seek
Route::get('/jobseek', function () {
    return view('alumni.jobseek');
})->name('jobseek');

// Forum
Route::get('/forum', function () {
    return view('alumni.forum');
})->name('forum');

// News
Route::get('/news', function () {
    return view('alumni.news');
})->name('news');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware(['auth', 'role:alumni', 'role:admin'])->group(function () {
    Route::get('/dashboard', fn() => view('alumni.dashboard'));
    Route::get('/jobs', fn() => view('alumni.jobs.index'));
});

Route::middleware(['auth', 'role:company', 'role:admin'])->group(function () {
    Route::get('/company/dashboard', fn() => view('company.dashboard'));
    Route::get('/company/jobs', fn() => view('company.jobs.index'));
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'));
    Route::resource('/admin/companies', App\Http\Controllers\Admin\CompanyController::class);
    Route::resource('/admin/alumni', App\Http\Controllers\Admin\AlumniController::class);
});


Route::middleware('guest')->group(function () {
    
    // 1. Route untuk Menampilkan Form (GET)
    Route::get('register-company', [CompanyRegisterController::class, 'create'])
        ->name('register.company');

    // 2. Route untuk Proses Submit Form (POST)
    Route::post('register-company', [CompanyRegisterController::class, 'store'])
        ->name('register.company.store');

    // ... route login/register user biasa yang sudah ada ...
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
