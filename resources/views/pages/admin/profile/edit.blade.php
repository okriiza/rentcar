@extends('layouts.admin')

@section('title')
    Profile - Mazer Admin Dashboard
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile</h3>
                <p class="text-subtitle text-muted">
                    Bootstrap’s cards provide a flexible and extensible content
                    container with multiple variants and options.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Card
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="content-types">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-sm-12 ">
                            <h4 class="card-title">Profile Information</h4>
                            <p class="card-text">
                                Update your account's profile information and email address.
                            </p>
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>
                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success">
                                    Saved.
                                </div>
                            @endif
                            <form class="form" method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="feedback1" class="sr-only">Name</label>
                                        <input type="text" id="feedback1"
                                            class="form-control  @error('name') is-invalid @enderror" placeholder="Name"
                                            name="name" value="{{ old('name', $user->name) }}" required autofocus
                                            autocomplete="name" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback4" class="sr-only">Email</label>
                                        <input type="email" id="feedback4"
                                            class="form-control  @error('email') is-invalid @enderror" placeholder="Email"
                                            name="email" value="{{ old('email', $user->email) }}" required
                                            autocomplete="username" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                            <div>
                                                <p class="fs-6 text-secondary">
                                                    {{ __('Your email address is unverified.') }}

                                                    <button form="send-verification" class="btn btn-secondary btn-sm">
                                                        {{ __('Click here to re-send the verification email.') }}
                                                    </button>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 fs-6 text-success">
                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-actions d-flex justify-content-start mt-3">
                                    <button type="submit" class="btn btn-primary me-1 btn-sm">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-sm-12 ">
                            <h4 class="card-title">Update Password
                            </h4>
                            <p class="card-text">
                                Ensure your account is using a long, random password to stay secure.
                            </p>
                            @if (session('status') === 'password-updated')
                                <div class="alert alert-success">
                                    Saved.
                                </div>
                            @endif
                            <form class="form" method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="feedback1" class="sr-only">Current Password</label>
                                        <input type="password" id="feedback1"
                                            class="form-control  @error('current_password') is-invalid @enderror"
                                            name="current_password" required autofocus autocomplete="current_password" />
                                        @error('current_password')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback4" class="sr-only">New Password</label>
                                        <input type="password" id="feedback4"
                                            class="form-control  @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="password" />
                                        @error('password')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback4" class="sr-only">Confirm Password</label>
                                        <input type="password" id="feedback4"
                                            class="form-control  @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="password_confirmation" />
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-actions d-flex justify-content-start mt-3">
                                    <button type="submit" class="btn btn-primary me-1 btn-sm">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-sm-12 ">
                            <h4 class="card-title">Delete Account
                            </h4>
                            <p class="card-text">
                                Once your account is deleted, all of its resources and data will be permanently deleted.
                                Before deleting your account, please download any data or information that you wish to
                                retain.
                            </p>
                            @if (session('status') === 'password-updated')
                                <div class="alert alert-success">
                                    Saved.
                                </div>
                            @endif

                            <!-- button trigger for  Vertically Centered modal -->
                            <button type="button" class="btn btn-danger btn-sm block" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">
                                DELETE
                            </button>
                            <!-- Vertically Centered modal Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <form class="form" method="post" action="{{ route('profile.destroy') }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    Delete Account
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete your account?</h5>
                                                <p>Once your account is deleted, all of its resources and data will be
                                                    permanently deleted. Please enter your password to confirm you would
                                                    like to
                                                    permanently delete your account.</p>
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label for="feedback4" class="sr-only">Password</label>
                                                        <input type="password" id="feedback4"
                                                            class="form-control  @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="password" />
                                                        @error('password')
                                                            <div class="invalid-feedback">
                                                                <i class="bx bx-radio-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-danger ms-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Delete Account</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
