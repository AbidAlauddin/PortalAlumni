<div>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Profil Perusahaan</h1>
        <p class="text-gray-500 text-sm">Kelola informasi publik yang akan dilihat oleh pelamar.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded relative animate-fade-in-down">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="update">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Logo Perusahaan</label>
                    
                    <div class="flex flex-col items-center">
                        <div class="w-32 h-32 mb-4 relative rounded-full overflow-hidden border-2 border-dashed border-gray-300 bg-gray-50 flex items-center justify-center group">
                            @if ($logo) 
                                <img src="{{ $logo->temporaryUrl() }}" class="w-full h-full object-cover">
                            @elseif ($existingLogo)
                                <img src="{{ asset('storage/' . $existingLogo) }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            @endif
                        </div>

                        <div class="w-full">
                            <label for="logo-upload" class="cursor-pointer flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-emerald-700 bg-emerald-50 rounded-lg hover:bg-emerald-100 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload Logo
                            </label>
                            <input id="logo-upload" type="file" wire:model="logo" class="hidden" accept="image/*">
                        </div>
                        <p class="text-xs text-gray-400 mt-2 text-center">Format: JPG, PNG. Max: 1MB</p>
                        @error('logo') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6 border-b pb-2">Informasi Umum</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                            <input wire:model="name" type="text" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm transition-all">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Resmi</label>
                            <input wire:model="email" type="email" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input wire:model="phone" type="text" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                            <input wire:model="website" type="url" placeholder="https://" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm">
                            @error('website') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Industri / Sektor</label>
                            <input wire:model="industry" type="text" placeholder="Contoh: Teknologi, Retail" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                        <textarea wire:model="address" rows="2" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm"></textarea>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tentang Perusahaan</label>
                        <textarea wire:model="description" rows="5" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm" placeholder="Ceritakan sejarah singkat, visi, dan misi perusahaan Anda..."></textarea>
                    </div>

                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg shadow-sm transition-colors flex items-center">
                            <span wire:loading.remove>Simpan Perubahan</span>
                            <span wire:loading class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>