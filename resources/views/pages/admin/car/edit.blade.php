@extends('layouts.admin')

@section('title')
    Edit Mobil - Rent Car
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Mobil</h3>
                <p class="text-subtitle text-muted">
                    Edit Mobil
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Mobil
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
                        <h4 class="card-title">Edit Mobil</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST"
                                action="{{ route('admin.car.update', $car->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="brand">Merk</label>
                                                <input type="text" id="brand"
                                                    class="form-control @error('brand') is-invalid @enderror" name="brand"
                                                    value="{{ $car->brand }}" placeholder="Merk" />
                                                @error('brand')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="model">Model</label>
                                                <input type="text" id="model"
                                                    class="form-control @error('model') is-invalid @enderror" name="model"
                                                    value="{{ $car->model }}" placeholder="Model" />
                                                @error('model')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="plat_number">Plat Nomor</label>
                                                <input type="text" id="plat_number"
                                                    class="form-control @error('plat_number') is-invalid @enderror"
                                                    name="plat_number" value="{{ $car->plat_number }}"
                                                    placeholder="Plat Nomor" />
                                                @error('plat_number')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="plat_number">Tarif Sewa</label>
                                                <input type="number" id="rental_rates"
                                                    class="form-control @error('rental_rates') is-invalid @enderror"
                                                    name="rental_rates" value="{{ $car->rental_rates }}"
                                                    placeholder="Tarif Sewa" />
                                                @error('rental_rates')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
