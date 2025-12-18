<div>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Pelamar</h2>
            <p class="text-sm text-gray-500">Kelola data pelamar yang masuk ke perusahaan Anda.</p>
        </div>
        
        <div class="flex gap-2">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari nama / posisi..." class="rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
            
            <select wire:model.live="statusFilter" class="rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
                <option value="">Semua Status</option>
                <option value="applied">Applied</option>
                <option value="reviewed">Reviewed</option>
                <option value="interview">Interview</option>
                <option value="accepted">Accepted</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded relative animate-fade-in-down">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
        @if($vacancies->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kandidat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Posisi Dilamar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status Aplikasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">CV</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($vacancies as $vacancy)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full object-cover border border-gray-200" 
                                     src="{{ $vacancy->alumni && $vacancy->alumni->profile_photo ? asset('storage/'.$vacancy->alumni->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($vacancy->alumni->name ?? 'User') . '&background=10b981&color=fff' }}" 
                                     alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $vacancy->alumni->name ?? 'User Terhapus' }}</div>
                                <div class="text-xs text-gray-500">{{ $vacancy->alumni->email ?? '-' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 font-medium">{{ $vacancy->jobseek->title ?? 'Posisi Dihapus' }}</div>
                        <div class="text-xs text-gray-500">{{ $vacancy->jobseek->location ?? '-' }}</div>
                    </td>
                    
                    {{-- KOLOM STATUS (EDITABLE) --}}
                    <td class="px-6 py-4">
                        @php
                            // Tentukan warna border/bg berdasarkan status saat ini
                            $statusClass = match($vacancy->status) {
                                'applied' => 'bg-gray-50 text-gray-700 border-gray-200',
                                'reviewed' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                'interview' => 'bg-blue-50 text-blue-700 border-blue-200',
                                'accepted' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'rejected' => 'bg-red-50 text-red-700 border-red-200',
                                default => 'bg-gray-50 border-gray-200'
                            };
                        @endphp

                        <div class="relative">
                            {{-- Dropdown Select dengan Livewire Change --}}
                            <select 
                                wire:change="updateStatus({{ $vacancy->id }}, $event.target.value)"
                                class="appearance-none block w-full pl-3 pr-8 py-1.5 text-xs font-semibold rounded-full border {{ $statusClass }} focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-emerald-500 cursor-pointer transition-colors"
                            >
                                <option value="applied" {{ $vacancy->status == 'applied' ? 'selected' : '' }}>Applied</option>
                                <option value="reviewed" {{ $vacancy->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                <option value="interview" {{ $vacancy->status == 'interview' ? 'selected' : '' }}>Interview</option>
                                <option value="accepted" {{ $vacancy->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="rejected" {{ $vacancy->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            
                            {{-- Icon Panah Custom (agar lebih rapi) --}}
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4 text-sm text-emerald-600">
                        @if($vacancy->cv_file)
                            <a href="{{ asset('storage/'.$vacancy->cv_file) }}" target="_blank" class="hover:underline flex items-center gap-1 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Lihat CV
                            </a>
                        @else
                            <span class="text-gray-400 text-xs italic">Tidak ada file</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <button wire:click="delete({{ $vacancy->id }})" wire:confirm="Apakah Anda yakin ingin menghapus data pelamar ini?" class="text-red-500 hover:text-red-700 transition-colors p-1 rounded hover:bg-red-50" title="Hapus">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div class="flex flex-col items-center justify-center py-12 text-gray-500">
                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <p>Belum ada data pelamar yang ditemukan.</p>
            </div>
        @endif
    </div>
    
    <div class="mt-4">
        {{ $vacancies->links() }}
    </div>
</div>