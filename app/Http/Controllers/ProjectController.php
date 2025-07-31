<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Method ini dipanggil saat Sales menekan tombol "Proses Project".
     * Fungsinya untuk membuat record project baru.
     */
    public function store(Lead $lead)
    {
        // Cek dulu untuk mencegah project duplikat untuk lead yang sama
        if (Project::where('lead_id', $lead->id)->exists()) {
            return redirect()->route('leads.index')->with('error', 'Lead ini sudah dalam proses project.');
        }

        // Buat project baru
        Project::create([
            'lead_id' => $lead->id,
            'user_id' => Auth::id(), // Mengambil ID Sales yang sedang login
            'status' => 'pending_approval', // Status awal
        ]);

        return redirect()->route('leads.index')->with('success', 'Project berhasil dibuat dan menunggu approval.');
    }

    /**
     * Method ini untuk menampilkan halaman approval yang hanya bisa diakses oleh Manager.
     */
    public function indexApproval()
    {
        // Ambil semua project yang statusnya 'pending_approval'
        // 'with' digunakan untuk mengambil data relasi (lead dan user) agar lebih efisien
        $projects = Project::with(['lead', 'user'])
                           ->where('status', 'pending_approval')
                           ->latest()
                           ->paginate(10);

        // Tampilkan view dan kirim data projects
        return view('projects.approval', compact('projects'));
    }

    /**
     * Method ini untuk menangani logika saat Manager menyetujui sebuah project.
     */
    public function approve(Project $project)
    {
        // DB::transaction memastikan semua proses di bawah ini berhasil,
        // jika ada satu yang gagal, semua akan dibatalkan (rollback).
        DB::transaction(function () use ($project) {
            // 1. Update status project menjadi 'approved'
            $project->update(['status' => 'approved']);

            // 2. Buat data customer baru dari data lead
            Customer::create([
                'name' => $project->lead->name,
                'email' => $project->lead->email,
                'phone' => $project->lead->phone,
            ]);

            // 3. (Opsional) Update status lead menjadi 'Converted'
            $project->lead->update(['status' => 'Converted']);
        });

        return redirect()->route('projects.approval')->with('success', 'Project telah disetujui dan customer baru telah ditambahkan.');
    }

    /**
     * Method ini untuk menangani logika saat Manager menolak sebuah project.
     */
    public function reject(Request $request, Project $project)
    {
        // Validasi bahwa alasan penolakan harus diisi
        $request->validate(['notes' => 'required|string']);

        $project->update([
            'status' => 'rejected',
            'notes' => $request->notes,
        ]);

        return redirect()->route('projects.approval')->with('success', 'Project telah ditolak.');
    }
}