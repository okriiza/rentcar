@extends('layouts.auth')

@section('title')
    Login - Mazer Admin Dashboard
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('themes/assets/compiled/css/auth.css') }}" />
@endpush

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html"><img src="{{ asset('themes/assets/compiled/svg/logo.svg') }}" alt="Logo" /></a>
                </div>
                <h1 class="auth-title">Log in.</h1>
                <p class="mb-5 auth-subtitle">
                    Log in with your data that you entered during registration.
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input class="form-control form-control-xl @error('email') is-invalid @enderror "
                            placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="username" />
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
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input type="password" name="password" required autocomplete="current-password"
                            class="form-control form-control-xl @error('password')
            is-invalid
            @enderror"
                            placeholder="Password" />
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
                        <label class="text-gray-600 form-check-label" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div>
                    <button class="mt-5 shadow-lg btn btn-primary btn-block btn-lg">
                        Log in
                    </button>
                </form>
                <div class="mt-5 text-lg text-center fs-4">
                    @if (Route::has('register'))
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-bold">Sign up</a>.
                        </p>
                    @endif
                    <p>
                        @if (Route::has('password.request'))
                            <a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
@endsection
