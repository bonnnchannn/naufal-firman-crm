<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Persetujuan Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Notifikasi Pesan Sukses --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Calon Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sales</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Pengajuan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($projects as $project)
                                {{-- Baris Data Utama --}}
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->lead->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                        {{-- Tombol Setuju --}}
                                        <form action="{{ route('projects.approve', $project) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-green-600 hover:text-green-900 font-bold bg-green-200 hover:bg-green-300 py-2 px-4 rounded-lg transition-all duration-200">
                                                Setuju
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                {{-- Baris untuk Form Penolakan --}}
                                <tr>
                                    <td colspan="4" class="px-6 pb-4">
                                        <form action="{{ route('projects.reject', $project) }}" method="POST">
                                            @csrf
                                            <div class="flex items-center">
                                                <input type="text" name="notes" placeholder="Tulis alasan penolakan di sini..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm" required>
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded-lg ml-2 transition-all duration-200">
                                                    Tolak
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                        Tidak ada project yang menunggu persetujuan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Link Paginasi --}}
                    <div class="mt-4">
                        {{ $projects->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
