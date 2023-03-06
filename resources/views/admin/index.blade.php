@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="me-md-3 me-xl-5">
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <h2>Dashboard</h2>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-body bg-danger text-white mb-3">
                            <label for="">Total Orders</label>
                            <h1>{{ $totalOrders }}</h1>
                            <a href="{{ url('admin/orders') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label for="">Today Orders</label>
                            <h1>{{ $todayOrders }}</h1>
                            <a href="{{ url('admin/orders') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-info text-white mb-3">
                            <label for="">This Month Orders</label>
                            <h1>{{ $thisMonthOrders }}</h1>
                            <a href="{{ url('admin/orders') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label for="">Year Orders</label>
                            <h1>{{ $thisYearOrders }}</h1>
                            <a href="{{ url('admin/orders') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-body bg-danger text-white mb-3">
                            <label for="">Total Products</label>
                            <h1>{{ $totalProducts }}</h1>
                            <a href="{{ url('admin/products') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label for="">Today Categories</label>
                            <h1>{{ $totalCategories }}</h1>
                            <a href="{{ url('admin/categories') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-info text-white mb-3">
                            <label for="">Total Brands</label>
                            <h1>{{ $totalBrands }}</h1>
                            <a href="{{ url('admin/brands') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-body bg-danger text-white mb-3">
                            <label for="">All Users</label>
                            <h1>{{ $totalAllUsers }}</h1>
                            <a href="{{ url('admin/products') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label for="">Total Users</label>
                            <h1>{{ $totalUsers }}</h1>
                            <a href="{{ url('admin/brands') }}" class="text-white" style="text-decoration: none;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-info text-white mb-3">
                            <label for="">Total Admins</label>
                            <h1>{{ $totalAdmins }}</h1>
                            <a href="{{ url('admin/users') }}" class="text-white" style="text-decoration: none;" style="text-decoration: none;" >View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
