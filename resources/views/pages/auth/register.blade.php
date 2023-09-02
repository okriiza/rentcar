@extends('layouts.auth')

@section('title')
    Register - Mazer Admin Dashboard
@endsection

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html"><img src="{{ asset('themes//assets/compiled/svg/logo.svg') }}" alt="Logo" /></a>
                </div>
                <h1 class="auth-title">Sign Up</h1>
                <p class="mb-5 auth-subtitle">
                    Input your data to register to our website.
                </p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input class="form-control form-control-xl @error('email') is-invalid @enderror "
                            placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="username" />
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input class="form-control form-control-xl @error('name') is-invalid @enderror" type="text"
                            name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                            placeholder="Nama" />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input class="form-control form-control-xl @error('address') is-invalid @enderror" type="text"
                            name="address" value="{{ old('address') }}" required autofocus autocomplete="address"
                            placeholder="Alamat" />
                        <div class="form-control-icon">
                            <i class="bi bi-house"></i>
                        </div>
                        @error('address')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input class="form-control form-control-xl @error('phone') is-invalid @enderror" type="text"
                            name="phone" value="{{ old('phone') }}" required autofocus autocomplete="phone"
                            placeholder="Nomor HP" />
                        <div class="form-control-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        @error('phone')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input class="form-control form-control-xl @error('sim_number') is-invalid @enderror" type="number"
                            name="sim_number" value="{{ old('sim_number') }}" required autofocus autocomplete="sim_number"
                            placeholder="Nomer SIM" />
                        <div class="form-control-icon">
                            <i class="bi bi-person-vcard"></i>
                        </div>
                        @error('sim_number')
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
                        Sign Up
                    </button>
                </form>
                <div class="mt-5 text-lg text-center fs-4">
                    <p class="text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-bold">Log in</a>.
                    </p>
                </div>
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
