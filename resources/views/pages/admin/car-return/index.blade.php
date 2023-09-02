@extends('layouts.admin')

@section('title')
    Pengembalian Mobil - Rent Car
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pengembalian Mobil</h3>
                <p class="text-subtitle text-muted">
                    Pengembalian Mobil
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pengembalian Mobil
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
                    <h5 class="card-title">Pengembalian</h5>
                </div>
            </div>
            <div class="card-body">
                <form class="form form-vertical" method="GET" action="{{ route('carreturn.search') }}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="plat_number">Masukkan Nomor Plat Mobil</label>
                                    <input type="text" id="plat_number"
                                        class="form-control  @error('plat_number') is-invalid @enderror" name="plat_number"
                                        value="{{ old('plat_number') }}" placeholder="Nomor Plat Mobil" />
                                    @error('plat_number')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-5">

                    @isset($cars)
                        @forelse ($cars as $car)
                            @php
                                $totalSewa = Carbon\Carbon::parse($car->date_start)->diffInDays($car->date_end) * $car->car->rental_rates;
                            @endphp
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6">
                                        <label>User Peminjam</label>
                                        <p>{{ $car->user->name }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>Tanggal Mulai</label>
                                        <p>{{ $car->date_start }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>Tanggal Selesai</label>
                                        <p>{{ $car->date_end }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>Merk</label>
                                        <p>{{ $car->car->brand }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>Plat Nomor Mobil</label>
                                        <p>{{ $car->car->plat_number }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>Model</label>
                                        <p>{{ $car->car->model }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>User Peminjam</label>
                                        <p>{{ $car->car->model }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>Harga Per Hari</label>
                                        <p>Rp.{{ number_format($car->car->rental_rates) }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>Total Hari Peminjaman</label>
                                        <p>{{ Carbon\Carbon::parse($car->date_start)->diffInDays($car->date_end) }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label>Total Pembayaran</label>
                                        <p>Rp.{{ number_format($totalSewa) }}</p>
                                    </div>
                                    <form action="{{ route('carreturn.store') }}" method="post">
                                        @csrf



                                        <input type="text" hidden name="car_loan_id" value="{{ $car->id }}">
                                        <input type="text" hidden name="total" value="{{ $totalSewa }}">
                                        <input type="text" hidden name="car_id" value="{{ $car->car->id }}">

                                        <button class="btn btn-outline-success shadow btn-xs sharp me-1 mb-1">
                                            <i class="bi bi-arrow-return-right"></i>
                                            Return
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endisset
                </div>
                <div class="mt-3 mb-2">
                    <h5>List Pengembalian</h5>
                </div>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Mobil</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @forelse ($carReturn as $car)
                            <tr>
                                <td>{{ $car->carloan->user->name ?? '' }}</td>
                                <td>{{ $car->carloan->car->brand }} - {{ $car->carloan->car->plat_number }}</td>
                                <td>Rp.{{ number_format($car->total) }}</td>
                                <td>{{ $car->carloan->status }}</td>
                                <td>{{ $car->created_at }}</td>
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
