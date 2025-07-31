<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use App\Models\Project;
use App\Models\Customer; // <-- 1. Import Customer

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customerCount = Customer::count(); // <-- 2. Get total customer count

        if ($user->role == 'manager') {
            $pendingProjects = Project::where('status', 'pending_approval')->count();

            return view('dashboard', [
                'pendingProjects' => $pendingProjects,
                'customerCount' => $customerCount // <-- 3. Send data to view
            ]);
        }
        else {
            $activeLeads = Lead::where('status', '!=', 'Converted')
                               ->where('status', '!=', 'Gagal')
                               ->count();

            return view('dashboard', [
                'activeLeads' => $activeLeads,
                'customerCount' => $customerCount // <-- 3. Send data to view
            ]);
        }
    }
}
