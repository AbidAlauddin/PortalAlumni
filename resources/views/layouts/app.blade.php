<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'JobPortal') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50"> 
    
    @include('layouts.partials.navbar')
    
    <main class="pt-28 pb-12 min-h-screen">
        
        {{-- Logika Hybrid: Livewire vs Blade Biasa --}}
        @if(isset($slot))
            {{-- Jika halaman Livewire (Profile), bungkus dengan container agar rapi --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        @else
            {{-- Jika halaman biasa (Jobseek), biarkan dia mengatur layoutnya sendiri --}}
            @yield('content')
        @endif

    </main>

    @include('layouts.partials.footer')

    @livewireScripts
</body>
</html>