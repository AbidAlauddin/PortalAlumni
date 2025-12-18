<div>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Lowongan</h2>
            <p class="text-sm text-gray-500">Kelola daftar pekerjaan yang Anda posting.</p>
        </div>
        
        <div class="flex gap-2">
            <input wire:model.live.debounce.300ms="search" 
                   type="text" 
                   placeholder="Cari posisi atau lokasi..." 
                   class="rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
            
            <select wire:model.live="statusFilter" 
                    class="rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
                <option value="">Semua Status</option>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
                <option value="expired">Expired</option>
            </select>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded relative">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
        @if($jobseeks->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posisi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi & Tipe</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gaji</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deadline</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($jobseeks as $job)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900">{{ $job->title }}</div>
                                <div class="text-xs text-gray-500 truncate w-48">{{ Str::limit($job->description, 40) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $job->location }}</div>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-50 text-blue-700 mt-1">
                                    {{ ucfirst($job->job_type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                Rp {{ number_format($job->salary_min, 0, ',', '.') }} - {{ number_format($job->salary_max, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColor = match($job->status) {
                                        'open' => 'bg-emerald-100 text-emerald-800',
                                        'closed' => 'bg-red-100 text-red-800',
                                        'expired' => 'bg-gray-100 text-gray-800',
                                        default => 'bg-gray-100 text-gray-800'
                                    };
                                @endphp
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                    {{ ucfirst($job->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="flex justify-end gap-3">
                                    <button wire:click="delete({{ $job->id }})" 
                                            wire:confirm="Yakin ingin menghapus lowongan ini?" 
                                            class="text-red-600 hover:text-red-900 font-semibold">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada lowongan ditemukan</h3>
                <p class="mt-1 text-sm text-gray-500">Coba ubah kata kunci pencarian atau filter status Anda.</p>
            </div>
        @endif
    </div>

    <div class="mt-4">
        {{ $jobseeks->links() }}
    </div>
</div>