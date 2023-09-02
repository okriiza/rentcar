@extends('layouts.admin')

@section('title')
    User - Rent Car
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>USERS</h3>
                <p class="text-subtitle text-muted">
                    user list
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            User
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
                    <h5 class="card-title">List User</h5>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah User</a>
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
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Nomor SIM</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->sim_number }}</td>
                                <td>{{ $user->roles }}</td>
                                <td>
                                    {{-- <a href="#" class="btn btn-outline-info shadow btn-xs sharp me-1 mb-1">
                                        <i class="bi bi-pencil"></i>
                                    </a> --}}
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="post"
                                        class="d-inline">
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
