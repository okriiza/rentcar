@extends('layouts.auth')

@section('title')
    Login - Mazer Admin Dashboard
@endsection

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html"><img src="{{ asset('themes/assets/compiled/svg/logo.svg') }}" alt="Logo" /></a>
                </div>
                <h1 class="auth-title">Forgot Password.</h1>
                <p class="mb-5 auth-subtitle">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password
                    reset link that will allow you to choose a new one. </p>
                @if (session('status'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="mt-5 shadow-lg btn btn-primary btn-block btn-lg">
                        Email Password Reset Link
                    </button>
                </form>

            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('themes/assets/compiled/css/auth.css') }}" />
@endpush
