@extends('layouts.auth')

@section('title', 'Expense Tracker Home')

@push('head')
    @vite(['resources/css/home.css'])
@endpush

@section('content')
    <div class="hero-section">
        <div class="hero-card">
            <div class="hero-icon">
                <i class="fas fa-wallet"></i>
            </div>
            <h1 class="hero-title">Expense Tracker</h1>
            <p class="hero-subtitle">
                Take control of your finances with our simple and intuitive expense tracking system.
                Monitor your spending, categorize expenses, and get detailed monthly reports.
            </p>

            <div class="mb-4">
                @guest
                    <div class="d-flex justify-content-center g-4">
                        <a href="{{ route('login') }}" class="btn-hero primary">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-hero secondary">
                            <i class="fas fa-user-plus me-2"></i>
                            Register
                        </a>
                    </div>
                @else
                    <a href="{{ route('home') }}" class="btn-hero primary">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Go to Dashboard
                    </a>
                @endguest
            </div>

            <div class="features">
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="feature-title">Easy Tracking</div>
                    <div class="feature-text">Add expenses quickly with our simple form</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <div class="feature-title">Visual Reports</div>
                    <div class="feature-text">See your spending patterns with charts</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="feature-title">Categories</div>
                    <div class="feature-text">Organize expenses by category</div>
                </div>
            </div>
        </div>
    </div>
@endsection
