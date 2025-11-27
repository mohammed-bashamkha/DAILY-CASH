<?php

namespace App\Http\Controllers;

use App\Models\Cashbox;
use App\Models\Entity;
use App\Models\RevenuesExpenses;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the cashbox record (assuming single cashbox for now)
        $cashbox = Cashbox::firstOrNew();

        $totalWorkers = Entity::where('type', 'worker')->count();
        $totalProjects = Entity::where('type', 'project')->count();

        // Get recent transactions
        $recentTransactions = RevenuesExpenses::with('entity')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('cashbox', 'recentTransactions','totalWorkers','totalProjects'));
    }
    // public function workersProjectsStats()
    // {
    //     $totalWorkers = Entity::where('type', 'worker')->count();
    //     $totalProjects = Entity::where('type', 'project')->count();

    //     return view('dashboard', compact( 'totalWorkers','totalProjects'));
    // }
}
