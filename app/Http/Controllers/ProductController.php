<?php

namespace App\Http\Controllers;

use App\Models\Product; // <-- 1. IMPORT MODEL PRODUCT
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        // 2. Ambil semua data produk, urutkan dari yang terbaru
        $products = Product::latest()->paginate(10);

        // 3. Tampilkan halaman index produk dan kirim data products
        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        // 4. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        // 5. Buat produk baru
        Product::create($request->all());

        // 6. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     * Kita menggunakan Route Model Binding (Product $product)
     * agar Laravel otomatis mencari produk berdasarkan ID.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Memperbarui data produk di database.
     */
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        // Update data produk
        $product->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}