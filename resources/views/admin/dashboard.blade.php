@extends('layouts.admin.main')

@section('title', 'Dashboard')

@section('page', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                        {{ $totAdmin }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        {{ $totUser }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Buku</h4>
                    </div>
                    <div class="card-body">
                        {{ $totBuku }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Order Statistics -
                        <div class="dropdown d-inline">
                            <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                id="orders-month">{{ $bulan }}</a>
                            <ul class="dropdown-menu dropdown-menu-sm">
                                <li class="dropdown-title">Select Month</li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'January' ? 'active' : '' }}">January</a></li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'February' ? 'active' : '' }}">February</a></li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'March' ? 'active' : '' }}">March</a>
                                </li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'April' ? 'active' : '' }}">April</a>
                                </li>
                                <li><a href="#" class="dropdown-item {{ $bulan == 'May' ? 'active' : '' }}">May</a>
                                </li>
                                <li><a href="#" class="dropdown-item {{ $bulan == 'June' ? 'active' : '' }}">June</a>
                                </li>
                                <li><a href="#" class="dropdown-item {{ $bulan == 'July' ? 'active' : '' }}">July</a>
                                </li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'August' ? 'active' : '' }}">August</a></li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'September' ? 'active' : '' }}">September</a>
                                </li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'October' ? 'active' : '' }}">October</a></li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'November' ? 'active' : '' }}">November</a></li>
                                <li><a href="#"
                                        class="dropdown-item {{ $bulan == 'December' ? 'active' : '' }}">December</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $booked }}</div>
                            <div class="card-stats-item-label">Booked</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $borrowed }}</div>
                            <div class="card-stats-item-label">Borrowed</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $returned }}</div>
                            <div class="card-stats-item-label">Returned</div>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $booked + $borrowed + $returned }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
