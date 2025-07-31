<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan halaman daftar semua pengguna.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Memperbarui peran (role) dari seorang pengguna.
     */
    public function updateRole(Request $request, User $user)
    {
        // Validasi input agar peran yang dimasukkan hanya 'sales' atau 'manager'
        $request->validate([
            'role' => ['required', 'string', 'in:sales,manager'],
        ]);

        // Update peran pengguna
        $user->update(['role' => $request->role]);

        return redirect()->route('users.index')->with('success', 'Peran pengguna berhasil diperbarui.');
    }
}