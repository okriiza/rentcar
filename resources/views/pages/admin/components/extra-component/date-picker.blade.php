@extends('layouts.admin')

@section('title')
    Date Picker - Mazer Admin Dashboard
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Date Picker</h3>
                <p class="text-subtitle text-muted">
                    Lightweight and powerful datetime picker with flatpickr
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Date Picker
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Usage</h4>
                    </div>
                    <div class="card-body">
                        <p><code>flatpickr</code> without any config</p>
                        <input type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date.." />

                        <p>Always-open date picker</p>
                        <input type="date" class="form-control flatpickr-always-open" placeholder="Select date.." />
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Date Range</h4>
                    </div>
                    <div class="card-body">
                        <p>You can choose the start date and the end date</p>
                        <input type="date" class="form-control flatpickr-range mb-3" placeholder="Select date.." />
                        <p>Preloaded date ranges</p>
                        <input type="date" class="form-control flatpickr-range-preloaded" placeholder="Select date.." />
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Time Picker</h4>
                    </div>
                    <div class="card-body">
                        <p>24-hour time picker</p>
                        <input type="date" class="form-control flatpickr-time-picker-24h" placeholder="Select time.." />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('themes/assets/extensions/flatpickr/flatpickr.min.css') }}" />
@endpush
@push('addon-script')
    <script src="{{ asset('themes/assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('themes/assets/static/js/pages/date-picker.js') }}"></script>
@endpush
