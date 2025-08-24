@extends('layouts.app')

@section('title', 'Add Expense')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">
                        <i class="fas fa-plus me-2"></i>
                        Add New Expense
                    </h1>
                    <a href="{{ route('expenses.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back to Expenses
                    </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <x-expense-form :$categories :message="isset($message) ? $message : null" :$errors />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
