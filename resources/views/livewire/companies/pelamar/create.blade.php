@extends('layouts.dashboard')

@section('title', 'Tambah Pelamar')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="mb-6">
        <a href="{{ route('company.applicants.index') }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
            <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Daftar Pelamar
        </a>
    </div>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-semibold leading-6 text-gray-900">Tambah Pelamar</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Tambahkan pelamar secara manual ke lowongan pekerjaan yang tersedia di perusahaan Anda.
                </p>
            </div>
        </div>

        <div class="mt-5 md:col-span-2 md:mt-0">
            <form wire:submit.prevent="store" class="shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 bg-white">
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-3">
                            <label for="user_id" class="block text-sm font-medium leading-6 text-gray-900">
                                Pilih Alumni
                            </label>
                            <div class="mt-2">
                                <select wire:model="user_id" id="user_id" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                                    <option value="">Pilih alumni...</option>
                                    @foreach($alumni as $alum)
                                        <option value="{{ $alum->user_id }}">{{ $alum->user->name }} ({{ $alum->user->email }})</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="job_id" class="block text-sm font-medium leading-6 text-gray-900">
                                Pilih Lowongan
                            </label>
                            <div class="mt-2">
                                <select wire:model="job_id" id="job_id" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                                    <option value="">Pilih lowongan...</option>
                                    @foreach($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->title }} - {{ $job->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('job_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">
                                Status Lamaran
                            </label>
                            <div class="mt-2">
                                <select wire:model="status" id="status" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                                    <option value="pending">Pending</option>
                                    <option value="reviewed">Reviewed</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                            @error('status') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="note" class="block text-sm font-medium leading-6 text-gray-900">
                                Catatan (Opsional)
                            </label>
                            <div class="mt-2">
                                <textarea wire:model="note" id="note" rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                            </div>
                            @error('note') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                    </div>
                </div>

                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8 bg-gray-50 rounded-b-xl">
                    <a href="{{ route('company.applicants.index') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">Batal</a>
                    <button type="submit" class="rounded-md bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600 transition-all">
                        Simpan Pelamar
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mt-4 rounded-md bg-green-50 p-4 border border-green-200">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mt-4 rounded-md bg-red-50 p-4 border border-red-200">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                        </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
