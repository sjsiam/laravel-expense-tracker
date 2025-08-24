@extends('layouts.app')

@section('title', 'View Expense')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">
                        <i class="fas fa-eye me-2"></i>
                        Expense Details
                    </h1>
                    <div>
                        <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-1"></i>
                            Edit
                        </a>
                        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>
                            Back to Expenses
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Title:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $expense->title }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Amount:</strong>
                            </div>
                            <div class="col-sm-9">
                                <span class="h4 text-primary">₹{{ number_format($expense->amount, 2) }}</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Date:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $expense->date->format('F d, Y') }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Category:</strong>
                            </div>
                            <div class="col-sm-9">
                                <span class="category-badge" style="background-color: {{ $expense->category->color }}">
                                    {{ $expense->category->name }}
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Created:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $expense->created_at->format('F d, Y g:i A') }}
                            </div>
                        </div>

                        @if ($expense->created_at != $expense->updated_at)
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Last Updated:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $expense->updated_at->format('F d, Y g:i A') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('expenses.destroy', $expense) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this expense?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash me-1"></i>
                                    Delete Expense
                                </button>
                            </form>

                            <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i>
                                Edit Expense
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
