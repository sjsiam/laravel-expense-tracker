@extends('layouts.auth')

@section('title', 'Login')

@push('head')
    @vite(['resources/css/auth.css'])
@endpush

@section('content')
    <div class="hero-card">
        <div class="auth-header">
            <div class="hero-icon">
                <i class="fas fa-sign-in-alt"></i>
            </div>
            <h2 class="hero-title">Welcome Back</h2>
            <p class="hero-subtitle">Sign in to your account to continue</p>
        </div>

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope me-2"></i>
                    Email Address
                </label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="Enter your email">
                @error('email')
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fas fa-lock me-2"></i>
                    Password
                </label>
                <div class="password-input">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Enter your password">
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye" id="password-icon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-auth">
                <i class="fas fa-sign-in-alt me-2"></i>
                Sign In
            </button>

            <div class="auth-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link">
                        <i class="fas fa-key me-1"></i>
                        Forgot your password?
                    </a>
                @endif
            </div>

            <div class="auth-divider">
                <span>Don't have an account?</span>
            </div>

            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-auth">
                <i class="fas fa-user-plus me-2"></i>
                Create Account
            </a>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
@endsection
