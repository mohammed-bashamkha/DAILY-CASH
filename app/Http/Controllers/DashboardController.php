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
        $user = Auth::user();

        // User Cashbox
        $cashbox = $user->cashbox;

        // Workers & Projects Count
        $totalWorkers = Entity::where('type', 'worker')
                            ->where('user_id', $user->id)
                            ->count();

        $totalProjects = Entity::where('type', 'project')
                            ->where('user_id', $user->id)
                            ->count();

        // Recent Transactions
        $recentTransactions = RevenuesExpenses::with('entity')
            ->where('created_by', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'cashbox',
            'recentTransactions',
            'totalWorkers',
            'totalProjects'
        ));
    }

    // public function workersProjectsStats()
    // {
    //     $totalWorkers = Entity::where('type', 'worker')->count();
    //     $totalProjects = Entity::where('type', 'project')->count();

    //     return view('dashboard', compact( 'totalWorkers','totalProjects'));
    // }
}
