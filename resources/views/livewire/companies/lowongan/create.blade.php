@extends('layouts.dashboard')

@section('title', 'Buat Lowongan Baru')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <div class="mb-6">
        <a href="{{ route('company.lowongan.index') }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
            <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Daftar Lowongan
        </a>
    </div>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-semibold leading-6 text-gray-900">Detail Lowongan</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Lengkapi informasi posisi pekerjaan dengan detail yang jelas untuk menarik kandidat terbaik.
                </p>
            </div>
        </div>

        <div class="mt-5 md:col-span-2 md:mt-0">
            <form wire:submit.prevent="store" class="shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 bg-white">
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Judul Posisi</label>
                            <div class="mt-2">
                                <input wire:model="title" type="text" id="title" 
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6" 
                                    placeholder="Contoh: Senior UI/UX Designer">
                            </div>
                            @error('title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Tipe Pekerjaan</label>
                            <div class="mt-2">
                                <select wire:model="type" id="type" 
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Contract">Contract</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Lokasi Kantor</label>
                            <div class="mt-2">
                                <select wire:model="location" id="location"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                                    <option value="">Pilih Lokasi</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="Surabaya">Surabaya</option>
                                    <option value="Remote">Remote</option>
                                </select>
                            </div>
                            @error('location') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Range Gaji (Opsional)</label>
                            <div class="mt-2 relative rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 sm:text-sm">Rp</span>
                                </div>
                                <input wire:model="salary" type="text" id="salary" 
                                    class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6" 
                                    placeholder="5.000.000 - 10.000.000">
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi Pekerjaan</label>
                            <div class="mt-2">
                                <textarea wire:model="description" id="description" rows="5" 
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                            @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="requirements" class="block text-sm font-medium leading-6 text-gray-900">Kualifikasi / Requirements</label>
                            <div class="mt-2">
                                <textarea wire:model="requirements" id="requirements" rows="5" 
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>
                        
                        <div class="col-span-full border-t border-gray-100 my-2"></div>

                        <div class="sm:col-span-3">
                            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status Publikasi</label>
                            <div class="mt-2">
                                <select wire:model="status" id="status" 
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                                    <option value="draft">Draft (Simpan Sementara)</option>
                                    <option value="published">Published (Tayangkan)</option>
                                    <option value="closed">Closed (Tutup)</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="deadline" class="block text-sm font-medium leading-6 text-gray-900">Batas Akhir Lamaran</label>
                            <div class="mt-2">
                                <input wire:model="deadline" type="date" id="deadline"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('deadline') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                    </div>
                </div>

                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8 bg-gray-50 rounded-b-xl">
                    <a href="{{ route('company.lowongan.index') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">Batal</a>
                    <button type="submit" 
                        class="rounded-md bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600 transition-all">
                        Simpan Lowongan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection