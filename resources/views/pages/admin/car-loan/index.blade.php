@extends('layouts.admin')

@section('title')
    Peminjaman Mobil - Rent Car
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Peminjaman Mobil</h3>
                <p class="text-subtitle text-muted">
                    Peminjaman Mobil
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Peminjaman Mobil
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Peminjaman</h5>
                </div>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="form form-vertical" method="POST" action="{{ route('carloan.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="date_start">Tanggal Mulai</label>
                                    <input type="date" id="date_start"
                                        class="form-control flatpickr-no-config @error('date_start') is-invalid @enderror"
                                        name="date_start" value="{{ old('date_start') }}" placeholder="Tanggal Mulai" />
                                    @error('date_start')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="date_end">Tanggal Selesai</label>
                                    <input type="date" id="date_end"
                                        class="form-control flatpickr-no-config @error('date_end') is-invalid @enderror"
                                        name="date_end" value="{{ old('date_end') }}" placeholder="Tanggal Selesai" />
                                    @error('date_end')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <fieldset class="form-group">
                                    <label for="cars">Mobil</label>
                                    <select class="form-select @error('car_id') is-invalid @enderror" id="basicSelect"
                                        name="car_id">
                                        @forelse ($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->brand }} - {{ $car->model }} -
                                                Rp.
                                                {{ number_format($car->rental_rates) }}
                                            </option>
                                        @empty
                                            <option disabled selected>Mobil Sudah Terboking semua</option>
                                        @endforelse
                                    </select>
                                    @error('car_id')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-3">
                                <fieldset class="form-group">
                                    <label for="users">User Peminjam</label>
                                    <select class="form-select @error('user_id') is-invalid @enderror" id="basicSelect"
                                        name="user_id">
                                        @if (Auth::user()->roles == 'USER')
                                            <option value="{{ Auth::user()->id }}">
                                                {{ Auth::user()->name }}
                                            </option>
                                        @else
                                            @forelse ($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @empty
                                                <option disabled selected>Tidak Ada User</option>
                                            @endforelse
                                        @endif

                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">List Peminjaman</h5>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Merk Mobil</th>
                            <th>Plat Nomor Mobil</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @forelse ($carLoans as $car)
                            <tr>
                                <td>{{ $car->user->name }}</td>
                                <td>{{ $car->date_start }}</td>
                                <td>{{ $car->date_end }}</td>
                                <td>{{ $car->car->brand }}</td>
                                <td>{{ $car->car->plat_number }}</td>
                                <td>{{ $car->status }}</td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">Data Tidak Ditemukan</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('themes/assets/extensions/simple-datatables/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/assets/compiled/css/table-datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/assets/extensions/flatpickr/flatpickr.min.css') }}" />
@endpush

@push('addon-script')
    <script src="{{ asset('themes/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('themes/assets/static/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('themes/assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('themes/assets/static/js/pages/date-picker.js') }}"></script>
@endpush
