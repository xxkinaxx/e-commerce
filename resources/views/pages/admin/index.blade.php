@extends('layouts.parent')
@section('title', 'Dashboard - Admin')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"></h1>

            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a></li>
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item">Data Product</li>
                    </ol>
                </nav>
            </div><!-- End Breadcrumbs with a page title -->

            <div class="section dashboard">
                <div class="row">
                    <div class="info-card customers-card">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h3>{{ Auth()->user()->name }}</h3>
                                <span class="text-danger small pt-1 fw-bold">{{ Auth()->user()->email }}</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="section dashboard">
    <div class="row">
        <!-- Sales Card -->
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Category</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $category }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
        <!-- Sales Card -->
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Product</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-bag-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $product }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
        <!-- Sales Card -->
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">User</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $user }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
    </div>
</div>
@endsection