@extends('layouts.admin')

@section('title')
    Tambah Mobil - Rent Car
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Mobil</h3>
                <p class="text-subtitle text-muted">
                    Tambah Mobil
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Mobil
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-vertical-layouts">
        <div class="row match-height d-flex justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <div class="mb-4 form-group position-relative has-icon-left">
                                    <input class="form-control form-control @error('email') is-invalid @enderror "
                                        placeholder="Email" type="email" name="email" value="{{ old('email') }}"
                                        required autofocus autocomplete="username" />
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
                                    <input class="form-control form-control @error('name') is-invalid @enderror"
                                        type="text" name="name" value="{{ old('name') }}" required autofocus
                                        autocomplete="name" placeholder="Nama" />
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
                                    <input class="form-control form-control @error('address') is-invalid @enderror"
                                        type="text" name="address" value="{{ old('address') }}" required autofocus
                                        autocomplete="address" placeholder="Alamat" />
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
                                    <input class="form-control form-control @error('phone') is-invalid @enderror"
                                        type="text" name="phone" value="{{ old('phone') }}" required autofocus
                                        autocomplete="phone" placeholder="Nomor HP" />
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
                                    <input class="form-control form-control @error('sim_number') is-invalid @enderror"
                                        type="number" name="sim_number" value="{{ old('sim_number') }}" required autofocus
                                        autocomplete="sim_number" placeholder="Nomer SIM" />
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
                                    <input type="password"
                                        class="form-control form-control @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" required autofocus
                                        autocomplete="new-password" placeholder="Password" />
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
                                        class="form-control form-control @error('password_confirmation') is-invalid @enderror"
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
                                <select class="mb-4 form-select @error('roles') is-invalid @enderror" id="basicSelect"
                                    name="roles">
                                    <option value="USER">User
                                    </option>
                                    <option value="ADMIN">Admin
                                    </option>
                                </select>
                                @error('roles')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button class=" shadow-lg btn btn-primary btn-block btn-lg">
                                    Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
