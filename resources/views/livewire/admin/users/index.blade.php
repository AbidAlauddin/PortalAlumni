<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Manajemen User</h2>
        
        <input wire:model.live="search" type="text" placeholder="Cari nama atau email..." 
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-64">
    </div>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th wire:click="sortBy('name')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                        Nama User
                        @if($sortField === 'name') 
                            <span>{!! $sortDirection === 'asc' ? '&#8593;' : '&#8595;' !!}</span>
                        @endif
                    </th>
                    
                    <th wire:click="sortBy('email')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                        Email
                        @if($sortField === 'email') 
                            <span>{!! $sortDirection === 'asc' ? '&#8593;' : '&#8595;' !!}</span>
                        @endif
                    </th>

                    <th wire:click="sortBy('role')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                        Role
                        @if($sortField === 'role') 
                            <span>{!! $sortDirection === 'asc' ? '&#8593;' : '&#8595;' !!}</span>
                        @endif
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Bergabung
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($user->role ?? 'User') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada data user ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $users->links() }}
        </div>
    </div>
</div>