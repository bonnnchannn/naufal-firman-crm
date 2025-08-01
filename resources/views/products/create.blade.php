<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Produk Baru') }}
            </h2>
            <nav class="text-sm text-gray-500">
                <a href="{{ route('products.index') }}" class="hover:text-gray-700">Produk</a>
                <span class="mx-2">/</span>
                <span class="text-gray-800">Tambah Baru</span>
            </nav>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-100">
                <div class="p-8 text-gray-900">

                    {{-- Notifikasi Error --}}
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6" role="alert">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Terjadi kesalahan dalam pengisian form</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Formulir Tambah Produk --}}
                    <form action="{{ route('products.store') }}" method="POST" class="space-y-8">
                        @csrf

                        {{-- Header Form --}}
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-center mb-2">
                                <div class="flex-shrink-0">
                                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-gray-900">Informasi Produk</h3>
                                    <p class="mt-1 text-sm text-gray-600">Masukkan detail produk yang akan ditambahkan ke sistem.</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-y-8">

                            {{-- Nama Produk --}}
                            <div class="group">
                                <label for="name" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Nama Produk
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           value="{{ old('name') }}"
                                           class="block w-full px-4 py-3 text-gray-900 bg-white border border-gray-300 rounded-lg shadow-sm 
                                                  focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                                                  transition-all duration-200 hover:border-gray-400"
                                           placeholder="Nama Produk"
                                           required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-green-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @else
                                    <p class="mt-2 text-sm text-gray-500 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Nama produk harus unik dan deskriptif
                                    </p>
                                @enderror
                            </div>

                            {{-- Deskripsi --}}
                            <div class="group">
                                <label for="description" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Deskripsi Produk
                                </label>
                                <div class="relative">
                                    <textarea name="description"
                                              id="description"
                                              rows="4"
                                              class="block w-full px-4 py-3 text-gray-900 bg-white border border-gray-300 rounded-lg shadow-sm 
                                                     focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                                                     transition-all duration-200 hover:border-gray-400"
                                              placeholder="Jelaskan fitur, spesifikasi, atau manfaat produk...">{{ old('description') }}</textarea>
                                    <div class="absolute bottom-3 right-3 text-gray-400 text-xs">
                                        Opsional
                                    </div>
                                </div>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @else
                                    <p class="mt-2 text-sm text-gray-500 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Bantu klien memahami produk dengan deskripsi yang jelas
                                    </p>
                                @enderror
                            </div>

                            {{-- Harga --}}
                            <div class="group">
                                <label for="price" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Harga (IDR)
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm font-medium">Rp</span>
                                    </div>
                                    <input type="number"
                                           name="price"
                                           id="price"
                                           value="{{ old('price') }}"
                                           class="block w-full pl-12 pr-4 py-3 text-gray-900 bg-white border border-gray-300 rounded-lg shadow-sm 
                                                  focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 
                                                  transition-all duration-200 hover:border-gray-400"
                                           placeholder="1000000"
                                           min="0"
                                           required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-green-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                    </div>
                                </div>
                                @error('price')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @else
                                    <p class="mt-2 text-sm text-gray-500 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Hanya angka tanpa titik/koma
                                    </p>
                                @enderror
                            </div>

                            {{-- Tips --}}
                            <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="text-sm font-medium text-green-800">Tips untuk Produk yang Efektif</h4>
                                        <div class="mt-2 text-sm text-green-700">
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Beri nama yang jelas dan mudah diingat</li>
                                                <li>Gunakan deskripsi yang menonjolkan keunggulan</li>
                                                <li>Pastikan harga kompetitif dan sesuai pasar</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="border-t border-gray-200 pt-8">
                            <div class="flex items-center justify-between">
                                <div class="flex space-x-4">
                                    <button type="submit"
                                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-700
                                                   text-white text-sm font-semibold rounded-lg shadow-lg
                                                   hover:from-green-700 hover:to-green-800 hover:shadow-xl
                                                   focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2
                                                   transform hover:-translate-y-0.5 transition-all duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Simpan Produk
                                    </button>
                                    <a href="{{ route('products.index') }}"
                                       class="inline-flex items-center px-6 py-3 bg-white text-gray-700 text-sm font-semibold
                                              border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 hover:text-gray-900
                                              focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2
                                              transition-all duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Batal
                                    </a>
                                </div>
                                <div class="hidden sm:flex items-center text-sm text-gray-500 bg-gray-50 px-3 py-2 rounded-lg">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Langkah 1 dari 1: Informasi Produk
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>