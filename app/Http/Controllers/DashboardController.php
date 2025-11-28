<?php

namespace App\Http\Controllers;

use App\Models\Cashbox;
use App\Models\Entity;
use App\Models\RevenuesExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the cashbox record (assuming single cashbox for now)
        $cashbox = Auth::user()->cashbox;

        $totalWorkers = Entity::where(['type'=>'worker','user_id'=>Auth::id()])->count();
        $totalProjects = Entity::where(['type'=>'project','user_id'=>Auth::id()])->count();

        // Get recent transactions
        $recentTransactions = RevenuesExpenses::with('entity')
            ->where('created_by', Auth::id())
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
