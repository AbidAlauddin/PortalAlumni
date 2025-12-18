<div class="min-h-screen bg-gray-50 pt-32 pb-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Halaman --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Profil Saya</h1>
            <p class="text-gray-600 mt-2">Kelola informasi profil dan data profesional Anda untuk menarik perhatian rekruter.</p>
        </div>

        {{-- Alert Success --}}
        @if (session()->has('success'))
            <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 px-4 py-3 rounded-lg flex items-center gap-3 animate-fade-in-down">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- FORM LIVEWIRE --}}
        <form wire:submit.prevent="update" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- KOLOM KIRI: FOTO PROFIL & CV --}}
            <div class="lg:col-span-1 space-y-6">
                
                {{-- Card Foto Profil --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-4 text-center">Foto Profil</label>
                    
                    {{-- Container Foto --}}
                    <div class="relative mx-auto mb-4 group" style="width: 128px; height: 128px;">
                        <div class="rounded-full overflow-hidden border-4 border-emerald-50 bg-gray-100 w-full h-full">
                            @if ($photo)
                                {{-- Preview Foto Baru --}}
                                <img src="{{ $photo->temporaryUrl() }}" class="w-full h-full object-cover">
                            @elseif ($existingPhoto)
                                {{-- Foto Lama dari DB --}}
                                <img src="{{ asset('storage/'.$existingPhoto) }}" class="w-full h-full object-cover">
                            @else
                                {{-- Avatar Default (PERBAIKAN: Gunakan $fullname) --}}
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($fullname) }}&background=10b981&color=fff&size=128" class="w-full h-full object-cover">
                            @endif
                        </div>
                        
                        {{-- Overlay Edit --}}
                        <label for="profile-photo" class="absolute inset-0 bg-black bg-opacity-50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </label>
                    </div>
                    
                    {{-- Input File Livewire --}}
                    <input id="profile-photo" type="file" wire:model="photo" class="hidden" accept="image/jpeg,image/jpg,image/png">
                    <p class="text-xs text-gray-500 text-center">Klik gambar untuk mengganti<br>Max 2MB (JPG/PNG)</p>
                    @error('photo') <span class="text-red-500 text-xs block text-center mt-2">{{ $message }}</span> @enderror
                </div>

                {{-- Card Upload CV --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Curriculum Vitae (CV)</label>
                    
                    @if($existingCv)
                        <div class="flex items-center gap-2 p-3 bg-emerald-50 rounded-lg mb-3">
                            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <div class="flex-1 min-w-0">
                                <a href="{{ asset('storage/'.$existingCv) }}" target="_blank" class="text-sm text-emerald-700 font-medium hover:underline truncate block">CV Saat Ini</a>
                            </div>
                        </div>
                    @endif

                    <label class="flex flex-col items-center px-4 py-6 bg-white text-emerald-600 rounded-lg shadow-sm border-dashed border-2 border-emerald-200 cursor-pointer hover:bg-emerald-50 transition-colors">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" /></svg>
                        <span class="mt-2 text-sm font-semibold">Upload CV Baru</span>
                        <span class="text-xs text-gray-500 mt-1">(PDF, Max 5MB)</span>
                        {{-- Input File Livewire --}}
                        <input type="file" wire:model="cv" class="hidden" accept=".pdf" />
                    </label>
                    <div wire:loading wire:target="cv" class="text-xs text-emerald-600 mt-2 text-center">Mengupload...</div>
                    @error('cv') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
                </div>

                {{-- Quick Stats --}}
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-lg p-6 text-white">
                    <h4 class="font-semibold mb-3">Kelengkapan Profil</h4>
                    <div class="flex items-center gap-3">
                        <div class="flex-1 bg-white bg-opacity-20 rounded-full h-2">
                            <div class="bg-white rounded-full h-2" style="width: {{ $profileCompletion }}%"></div>
                        </div>
                        <span class="font-bold">{{ $profileCompletion }}%</span>
                    </div>
                    <p class="text-xs mt-2 opacity-90">Lengkapi profil untuk meningkatkan peluang diterima kerja</p>
                </div>
            </div>

            {{-- KOLOM KANAN: FORM DATA --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- Data Pribadi --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2 border-b pb-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Data Pribadi
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="fullname" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            @error('fullname') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">NIM <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="nim" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            @error('nim') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                            <input type="text" wire:model="phone" placeholder="08xxxxxxxxxx" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                            <textarea wire:model="address" rows="3" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                            @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                {{-- Data Akademik --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2 border-b pb-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Data Akademik
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="program_study" placeholder="Contoh: Teknik Informatika" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            @error('program_study') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Fakultas <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="faculty" placeholder="Contoh: Teknik" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            @error('faculty') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Lulus <span class="text-red-500">*</span></label>
                            <input type="number" wire:model="graduation_year" min="1990" max="{{ date('Y') + 5 }}" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            @error('graduation_year') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                {{-- Data Profesional --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2 border-b pb-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Data Profesional
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bio Singkat</label>
                            <textarea wire:model="bio" rows="4" placeholder="Ceritakan sedikit tentang diri Anda..." class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                            @error('bio') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn URL</label>
                            <input type="url" wire:model="linkedin" placeholder="https://linkedin.com/in/username" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            @error('linkedin') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Portfolio URL</label>
                            <input type="url" wire:model="portfolio_url" placeholder="https://yourportfolio.com" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            @error('portfolio_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-end pt-4">
                    <a href="{{ route('dashboard') }}" class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-full hover:bg-gray-50 transition text-center">Batal</a>
                    
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-700 hover:to-emerald-600 text-white font-bold rounded-full shadow-lg transition flex items-center justify-center gap-2">
                        <span wire:loading.remove>Simpan Perubahan</span>
                        <span wire:loading class="flex items-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Menyimpan...
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>