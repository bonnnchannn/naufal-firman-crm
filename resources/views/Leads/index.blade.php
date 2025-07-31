<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calon Customer (Leads)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Menampilkan Notifikasi Sukses atau Error --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    {{-- Tombol Tambah Lead --}}
                    <div class="mb-4">
                        <a href="{{ route('leads.create') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                            + Tambah Lead
                        </a>
                    </div>

                    {{-- Tabel Data Leads --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Telepon</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($leads as $lead)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $lead->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $lead->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $lead->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $lead->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('leads.edit', $lead) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        
                                        {{-- Tombol Proses Project --}}
                                        <form action="{{ route('projects.store', $lead) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-green-600 hover:text-green-900 ml-4">Proses Project</button>
                                        </form>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lead ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                        Data lead tidak ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Link Paginasi --}}
                    <div class="mt-4">
                        {{ $leads->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```