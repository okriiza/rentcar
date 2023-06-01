@extends('layouts.auth')

@section('title')
    Reset Password - Mazer Admin Dashboard
@endsection

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html"><img src="{{ asset('themes//assets/compiled/svg/logo.svg') }}" alt="Logo" /></a>
                </div>
                <h1 class="auth-title">Reset Password</h1>
                <p class="mb-5 auth-subtitle">
                    Reset your password
                </p>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input class="form-control form-control-xl @error('email') is-invalid @enderror "
                            placeholder="Email" type="email" name="email" value="{{ old('email', $request->email) }}"
                            required autofocus autocomplete="username" />
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
                        <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
                            name="password" value="{{ old('password') }}" required autofocus autocomplete="new-password"
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
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input type="password" name="password_confirmation" required autocomplete="new-password"
                            class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirm Password" />
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="mt-5 shadow-lg btn btn-primary btn-block btn-lg">
                        Reset Password
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
