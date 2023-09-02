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
                <form class="form form-vertical" method="GET" action="{{ route('admin.carreturn.search') }}">
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

                @foreach ($cars as $car)
                    <div class="card">
                        <div class="card-body">
                            <tr>
                                <td>{{ $car->date_start }}</td>
                                <td>{{ $car->date_end }}</td>
                                <td>{{ $car->car->brand }}</td>
                                <td>{{ $car->car->plat_number }}</td>
                                <td>{{ $car->car->model }}</td>
                                <td>{{ $car->user->name }}</td>
                                <td>
                                    {{ Carbon\Carbon::parse($car->date_start)->diffInDays($car->date_end) }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.car.destroy', $car->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-success shadow btn-xs sharp me-1 mb-1">
                                            <i class="bi bi-arrow-return-right"></i>
                                            Return
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </div>
                    </div>
                @endforeach
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
