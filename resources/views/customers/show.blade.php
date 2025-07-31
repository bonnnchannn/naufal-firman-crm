<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Customer: ') . $customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <h3 class="text-lg font-medium">Informasi Kontak</h3>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <p><strong>Nama:</strong> {{ $customer->name }}</p>
                        <p><strong>Email:</strong> {{ $customer->email }}</p>
                        <p><strong>Telepon:</strong> {{ $customer->phone }}</p>
                        <p><strong>Tanggal Bergabung:</strong> {{ $customer->created_at->format('d F Y') }}</p>
                    </div>

                    <hr class="my-6">

                    {{-- 1. Bagian untuk menampilkan daftar layanan --}}
                    <h3 class="text-lg font-medium">Layanan yang Dilanggan</h3>
                    <div class="mt-4">
                        <ul class="list-disc list-inside">
                            @forelse ($customer->products as $product)
                                <li>{{ $product->name }} - {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</li>
                            @empty
                                <li class="text-gray-500">Belum ada layanan yang terdaftar.</li>
                            @endforelse
                        </ul>
                    </div>
                    
                    <hr class="my-6">

                    {{-- 2. Bagian untuk menambah layanan baru --}}
                    <h3 class="text-lg font-medium">Tambahkan Layanan Baru</h3>
                    <form action="{{ route('customers.addSubscription', $customer) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="flex items-center space-x-4">
                            <div>
                                <label for="product_id" class="block text-sm font-medium text-gray-700">Pilih Layanan</label>
                                <select name="product_id" id="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                <input type="date" name="start_date" id="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-white">&nbsp;</label>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-8">
                         <a href="{{ route('customers.index') }}" class="text-indigo-600 hover:text-indigo-900">Kembali ke Daftar Customer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>