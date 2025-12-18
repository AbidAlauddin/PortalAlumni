<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

use App\Livewire\Alumni\Profile as AlumniProfile;
use App\Livewire\Admin\Users\Index as UserIndex;

// Controllers
use App\Http\Controllers\Auth\CompanyRegisterController;
use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumniController;
use App\Http\Controllers\Alumni\JobController; // Pastikan nanti buat controller ini


// Livewire Components - Dashboard (PENTING: Import ini ditambahkan)
use App\Livewire\Dashboard\Index as DashboardIndex;

// Livewire Components - Companies (Lowongan)
use App\Livewire\Companies\Lowongan\Index as LowonganIndex;
use App\Livewire\Companies\Lowongan\Create as LowonganCreate;
use App\Livewire\Companies\Lowongan\Edit as LowonganEdit;
use App\Livewire\Companies\Lowongan\Show as LowonganShow;

// Livewire Components - Companies (Pelamar)
use App\Livewire\Companies\Pelamar\Index as PelamarIndex;
use App\Livewire\Companies\Pelamar\Show as PelamarShow;
use App\Livewire\Companies\Pelamar\Create as PelamarCreate;

use App\Livewire\Companies\Profile as CompanyProfile;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('home'); });

// Halaman Public Alumni
Route::view('/course', 'alumni.course')->name('course');
Route::get('/jobseek', [JobController::class, 'index'])->name('jobseek');
Route::post('/jobseek/apply', [JobController::class, 'apply'])->name('jobseek.apply');
Route::get('/profile', AlumniProfile::class)->name('alumni.profile');
Route::view('/forum', 'alumni.forum')->name('forum');
Route::view('/news', 'alumni.news')->name('news');

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('register-company', [CompanyRegisterController::class, 'create'])->name('register.company');
    Route::post('register-company', [CompanyRegisterController::class, 'store'])->name('register.company.store');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

// 1. GROUP ALUMNI
Route::middleware(['auth', 'role:alumni|admin'])->group(function () {
    Route::get('/dashboard', fn() => view('alumni.dashboard'))->name('dashboard'); 
    Route::get('/jobs', fn() => view('alumni.jobs.index'))->name('alumni.jobs');
});

// 2. GROUP COMPANY (Admin juga bisa akses)
Route::middleware(['auth', 'role:company|admin'])
    ->prefix('company')
    ->name('company.') // Semua route di sini diawali "company."
    ->group(function () {
        
        // Dashboard (Menggunakan Component Livewire Baru)
        Route::get('/dashboard', DashboardIndex::class)->name('dashboard');
        
        // Analytics (Bisa diarahkan ke Dashboard juga atau view terpisah)
        Route::get('/analytics', DashboardIndex::class)->name('analytics'); 

        // Profile Redirect
        Route::get('/profile', CompanyProfile::class)->name('profile');
        // --- MANAJEMEN LOWONGAN ---
        Route::get('/lowongan', LowonganIndex::class)->name('lowongan.index');
        Route::get('/lowongan/create', LowonganCreate::class)->name('lowongan.create');
        Route::get('/lowongan/{id}/edit', LowonganEdit::class)->name('lowongan.edit');
        Route::get('/lowongan/{id}/show', LowonganShow::class)->name('lowongan.show');

        // --- MANAJEMEN PELAMAR ---
        Route::get('/applicants', PelamarIndex::class)->name('applicants.index');
        Route::get('/applicants/create', PelamarCreate::class)->name('applicants.create');
        Route::get('/applicants/{id}', PelamarShow::class)->name('applicants.show');
    });

// 3. GROUP ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::resource('/companies', AdminCompanyController::class);
    Route::resource('/alumni', AdminAlumniController::class);
    Route::get('/users', UserIndex::class)->name('users.index');
});


/*
|--------------------------------------------------------------------------
| Settings Routes (Volt)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
    Volt::route('settings/two-factor', 'settings.two-factor')->name('two-factor.show');
});