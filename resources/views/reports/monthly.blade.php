@extends('layouts.app')

@section('title', 'Monthly Report')

@push('styles')
    <style>
        .report-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
        }

        .category-row {
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 12px;
            margin: 4px 0;
        }

        .category-row:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .chart-container {
            position: relative;
            height: 400px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">
                        <i class="fas fa-chart-bar me-2"></i>
                        Monthly Report - {{ $date->format('F Y') }}
                    </h1>
                    <a href="{{ route('expenses.index') }}" class="btn btn-secondary">
                        <i class="fas fa-list me-1"></i>
                        View Expenses
                    </a>
                </div>
            </div>
        </div>

        <!-- Month Selector -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form method="GET">
                            <div class="mb-3">
                                <label for="month" class="form-label">Select Month</label>
                                <input type="month" class="form-control" id="month" name="month"
                                    value="{{ $month }}" onchange="this.form.submit()">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card report-card">
                    <div class="card-body text-center">
                        <h2 class="card-title mb-0">
                            ৳
                            {{ number_format($totalAmount, 2) }}
                        </h2>
                        <p class="card-text">Total Expenses for {{ $date->format('F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if ($groupedExpenses->count() > 0)
            <div class="row">
                <!-- Expense Summary -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-list-ul me-2"></i>
                                Category Summary
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach ($groupedExpenses as $categoryName => $data)
                                <div class="category-row">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <div
                                                    style="width: 20px; height: 20px; background-color: {{ $data['color'] }}; border-radius: 50%;">
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $categoryName }}</h6>
                                                <small class="text-muted">{{ $data['count'] }}
                                                    {{ $data['count'] == 1 ? 'expense' : 'expenses' }}</small>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <h5 class="mb-0">৳{{ number_format($data['total'], 2) }}</h5>
                                            <small class="text-muted">
                                                {{ $totalAmount > 0 ? number_format(($data['total'] / $totalAmount) * 100, 1) : 0 }}%
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Total</strong>
                                <strong class="text-primary h5">৳{{ number_format($totalAmount, 2) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-chart-pie me-2"></i>
                                Visual Breakdown
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="expenseChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-chart-bar fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted mb-3">No expenses found for {{ $date->format('F Y') }}</h5>
                            <p class="text-muted mb-4">Start tracking your expenses to see detailed reports here.</p>
                            <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>
                                Add Expense
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if ($groupedExpenses->count() > 0)
        <script>
            const ctx = document.getElementById('expenseChart').getContext('2d');
            const chartData = @json($chartData);

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        data: chartData.data,
                        backgroundColor: chartData.colors,
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    return `${label}: ৳${value.toLocaleString()} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
        </script>
    @endif
@endpush
