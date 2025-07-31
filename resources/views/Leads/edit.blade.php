<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lead') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('leads.update', $lead) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $lead->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $lead->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $lead->phone) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="Baru" {{ old('status', $lead->status) == 'Baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="Dihubungi" {{ old('status', $lead->status) == 'Dihubungi' ? 'selected' : '' }}>Dihubungi</option>
                                    <option value="Gagal" {{ old('status', $lead->status) == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                                    <option value="Converted" {{ old('status', $lead->status) == 'Converted' ? 'selected' : '' }} disabled>Converted</option>
                                </select>
                                @error('status')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('leads.index') }}" class="ml-4 text-gray-600">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>