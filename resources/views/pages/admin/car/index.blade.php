@extends('layouts.admin')

@section('title')
    Manajemen Mobil - Rent Car
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manajemen Mobil</h3>
                <p class="text-subtitle text-muted">
                    Manajemen Mobil
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Manajemen Mobil
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
                    <h5 class="card-title">List Mobil</h5>
                    <a href="{{ route('car.create') }}" class="btn btn-primary">Tambah Mobil</a>
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
                            <th>Merk</th>
                            <th>Model</th>
                            <th>Plat Nomor</th>
                            <th>Tarif Sewa</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @forelse ($cars as $car)
                            <tr>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->plat_number }}</td>
                                <td>Rp.{{ number_format($car->rental_rates, 0, ',', '.') }}</td>
                                <td>{{ $car->status }}</td>
                                <td>
                                    <a href="{{ route('car.edit', $car->id) }}"
                                        class="btn btn-outline-info shadow btn-xs sharp me-1 mb-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('car.destroy', $car->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger shadow btn-xs sharp me-1 mb-1">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
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
@endpush

@push('addon-script')
    <script src="{{ asset('themes/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('themes/assets/static/js/pages/simple-datatables.js') }}"></script>
@endpush
