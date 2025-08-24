@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4 text-gray-800">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </h1>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-receipt fa-2x"></i>
                            </div>
                            <div>
                                <div class="h5 mb-0 font-weight-bold">{{ $totalExpenses }}</div>
                                <div class="small">Total Expenses</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-calendar-month fa-2x"></i>
                            </div>
                            <div>
                                <div class="h5 mb-0 font-weight-bold">₹{{ number_format($currentMonthExpenses, 2) }}</div>
                                <div class="small">This Month</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-calendar-day fa-2x"></i>
                            </div>
                            <div>
                                <div class="h5 mb-0 font-weight-bold">₹{{ number_format($todayExpenses, 2) }}</div>
                                <div class="small">Today</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-chart-line fa-2x"></i>
                            </div>
                            <div>
                                <div class="h5 mb-0 font-weight-bold">
                                    ₹{{ $totalExpenses > 0 ? number_format($currentMonthExpenses / max($totalExpenses, 1), 2) : '0.00' }}
                                </div>
                                <div class="small">Avg per Expense</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Expenses -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-clock me-2"></i>
                            Recent Expenses
                        </h5>
                        <a href="{{ route('expenses.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>
                            View All
                        </a>
                    </div>
                    <div class="card-body">
                        @if ($recentExpenses->count() > 0)
                            @foreach ($recentExpenses as $expense)
                                <div class="expense-item p-3 mb-2 rounded">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">{{ $expense->title }}</h6>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $expense->date->format('M d, Y') }}
                                            </small>
                                            <span class="category-badge ms-2"
                                                style="background-color: {{ $expense->category->color }}">
                                                {{ $expense->category->name }}
                                            </span>
                                        </div>
                                        <div class="text-end">
                                            <h5 class="mb-0 text-primary">₹{{ number_format($expense->amount, 2) }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No expenses yet. <a href="{{ route('expenses.create') }}">Add your
                                        first expense</a>!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
