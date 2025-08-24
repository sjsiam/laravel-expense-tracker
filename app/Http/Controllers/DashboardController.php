<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Dashboard statistics
        $totalExpenses = $user->expenses()->count();
        $currentMonthExpenses = $user->expenses()
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('amount');

        $todayExpenses = $user->expenses()
            ->whereDate('date', today())
            ->sum('amount');

        $recentExpenses = $user->expenses()
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact('totalExpenses', 'currentMonthExpenses', 'todayExpenses', 'recentExpenses'));
    }
}
