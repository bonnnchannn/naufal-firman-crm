<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen User') }}
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

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ubah role</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- Form hanya akan tampil jika user yang ditampilkan bukan user yang sedang login --}}
                                        @if (Auth::user()->id !== $user->id)
                                            <form action="{{ route('users.updateRole', $user) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="flex items-center">
                                                    <select name="role" class="rounded-md border-gray-300 shadow-sm text-sm">
                                                        <option value="sales" @if($user->role == 'sales') selected @endif>Sales</option>
                                                        <option value="manager" @if($user->role == 'manager') selected @endif>Manager</option>
                                                    </select>
                                                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-3 rounded ml-2">Simpan</button>
                                                </div>
                                            </form>
                                        @else
                                            <span class="text-gray-400 text-sm">Tidak dapat mengubah peran sendiri</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                     <div class="mt-4">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>