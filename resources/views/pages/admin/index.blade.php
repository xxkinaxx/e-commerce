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
        <div class="col-md-6">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Category</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $category }} Categories</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
        <!-- Sales Card -->
        <div class="col-md-6">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Product</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-bag-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $product }} Products</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
        <!-- Sales Card -->
        <div class="col-md-12">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Total User</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $user }} Users</h6>
                        </div>
                    </div>
                </div>
                <!-- Table with stripped rows -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#confirmReset{{$row->id}}">
                                        <i class="bi bi-exclamation-triangle"></i>
                                        Reset Password
                                    </button>
                                    @include('pages.admin.include.confirm')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No enteries yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div><!-- End Sales Card -->
    </div>
</div>
@endsection