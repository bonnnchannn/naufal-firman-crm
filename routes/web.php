<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk dasbor, bisa diakses setelah login
use App\Http\Controllers\DashboardController; // Jangan lupa tambahkan ini di atas

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');


// Grup rute untuk SEMUA PENGGUNA yang sudah login (Sales & Manager)
Route::middleware('auth')->group(function () {
    // Rute untuk profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute resource untuk CRUD Produk
    Route::resource('products', ProductController::class);

    // Rute resource untuk CRUD Leads
    Route::resource('leads', LeadController::class);

    // Rute untuk membuat project dari lead (untuk Sales)
    Route::post('leads/{lead}/create-project', [ProjectController::class, 'store'])->name('projects.store');

    // Batasi akses Customer: Sales hanya bisa melihat daftar dan detail
    Route::resource('customers', CustomerController::class)->only(['index', 'show']);
    
    // Rute untuk menambahkan layanan ke seorang customer
    Route::post('/customers/{customer}/add-subscription', [CustomerController::class, 'addSubscription'])->name('customers.addSubscription');
});


// Grup rute HANYA UNTUK MANAGER
Route::middleware(['auth', 'role:manager'])->group(function () {
    // Halaman untuk menampilkan daftar project yang perlu di-approve
    Route::get('/projects/approval', [ProjectController::class, 'indexApproval'])->name('projects.approval');

    // Rute untuk memproses approval (menyetujui atau menolak)
    Route::post('/projects/{project}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
    Route::post('/projects/{project}/reject', [ProjectController::class, 'reject'])->name('projects.reject');

    // Tambahkan rute untuk Manajemen User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});


// File yang berisi rute-rute autentikasi (login, register, dll.)
require __DIR__.'/auth.php';