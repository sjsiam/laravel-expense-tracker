<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __invoke(Request $request)
    {
        $month = $request->get('month', now()->format('Y-m'));
        $date = Carbon::createFromFormat('Y-m', $month);

        $expenses = Auth::user()->expenses()
            ->with('category')
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->get();

        $groupedExpenses = $expenses->groupBy('category.name')->map(function ($items) {
            return [
                'total' => $items->sum('amount'),
                'color' => $items->first()->category->color,
                'count' => $items->count(),
            ];
        });

        $totalAmount = $expenses->sum('amount');

        $chartData = [
            'labels' => $groupedExpenses->keys()->toArray(),
            'data' => $groupedExpenses->values()->pluck('total')->toArray(),
            'colors' => $groupedExpenses->values()->pluck('color')->toArray(),
        ];

        return view('reports.monthly', compact('groupedExpenses', 'totalAmount', 'month', 'chartData', 'date'));
    }
}
