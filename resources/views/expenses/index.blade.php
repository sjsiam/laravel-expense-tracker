@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">
                        <i class="fas fa-list me-2"></i>
                        My Expenses
                    </h1>
                    <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Add Expense
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if ($expenses->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expenses as $expense)
                                            <tr>
                                                <td>{{ $expense->date->format('M d, Y') }}</td>
                                                <td>
                                                    <strong>{{ $expense->title }}</strong>
                                                </td>
                                                <td>
                                                    <span class="category-badge"
                                                        style="background-color: {{ $expense->category->color }}">
                                                        {{ $expense->category->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <strong
                                                        class="text-primary">৳{{ number_format($expense->amount, 2) }}</strong>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('expenses.show', $expense) }}"
                                                            class="btn btn-sm btn-outline-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('expenses.edit', $expense) }}"
                                                            class="btn btn-sm btn-outline-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('expenses.destroy', $expense) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Are you sure you want to delete this expense?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" style="border-top-left-radius:0; border-bottom-left-radius:0" >
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center">
                                {{ $expenses->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted mb-3">No expenses found</h5>
                                <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>
                                    Add Your First Expense
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
