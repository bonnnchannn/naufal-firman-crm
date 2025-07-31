<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product; // <-- 1. Import model Product
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Menampilkan daftar semua customer.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Menampilkan detail satu customer.
     */
    public function show(Customer $customer)
    {
        // 2. Ambil semua data produk untuk ditampilkan di form dropdown
        $products = Product::all(); 
        return view('customers.show', compact('customer', 'products'));
    }

    /**
     * 3. Tambahkan method baru ini untuk menambah layanan ke customer.
     */
    public function addSubscription(Request $request, Customer $customer)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
        ]);

        // 'attach' adalah method untuk menambahkan data ke tabel pivot (subscriptions)
        $customer->products()->attach($request->product_id, ['start_date' => $request->start_date]);

        return redirect()->route('customers.show', $customer)->with('success', 'Layanan berhasil ditambahkan.');
    }

    // --- Method di bawah ini sengaja tidak digunakan ---

    public function create()
    {
        // Tidak ada aksi
    }

    public function store(Request $request)
    {
        // Tidak ada aksi
    }
    
    public function edit(Customer $customer)
    {
        // Tidak ada aksi
    }
    
    public function update(Request $request, Customer $customer)
    {
        // Tidak ada aksi
    }
    
    public function destroy(Customer $customer)
    {
        // Tidak ada aksi
    }
}