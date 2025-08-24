@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h2 class="auth-title">Create Account</h2>
            <p class="auth-subtitle">Join us to start tracking your expenses</p>
        </div>

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">
                    <i class="fas fa-user me-2"></i>
                    Full Name
                </label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">
                @error('name')
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope me-2"></i>
                    Email Address
                </label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
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
                        name="password" required autocomplete="new-password" placeholder="Create a password">
                    <button type="button" class="password-toggle" onclick="togglePassword('password', 'password-icon')">
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
                <label for="password-confirm" class="form-label">
                    <i class="fas fa-lock me-2"></i>
                    Confirm Password
                </label>
                <div class="password-input">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirm your password">
                    <button type="button" class="password-toggle"
                        onclick="togglePassword('password-confirm', 'confirm-icon')">
                        <i class="fas fa-eye" id="confirm-icon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-auth">
                <i class="fas fa-user-plus me-2"></i>
                Create Account
            </button>

            <div class="auth-divider">
                <span>Already have an account?</span>
            </div>

            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-auth">
                <i class="fas fa-sign-in-alt me-2"></i>
                Sign In
            </a>
        </form>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);

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
