@extends('layouts.parent')
@section('title', 'My Transaction')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"></h1>

            <div class="pagetitle">
                <h1>Transaction</h1>
                <nav>
                    <ol class="breadcrumb">
                        @if (Auth::user()->role ===' admin')
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @else
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        @endif
                        <li class="breadcrumb-item">Transaction</li>
                        <li class="breadcrumb-item" class="active">My Transaction</li>
                    </ol>
                </nav>
            </div><!-- End Breadcrumbs with a page title -->

        </div>
    </div>

    <div class="section dashboard">
        <div class="row">
            <!-- Sales Card -->
            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Pending</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pending }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Settlement</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $settlement }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Expired</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $expired }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i> Transaction list</div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name Account</td>
                        <td>Reciever Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Status</td>
                        <td>Total Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mytransaction as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            @if ($row->status == 'EXPIRED')
                            <span class="badge bg-danger text-uppercase">Expired</span>
                            @elseif ($row->status == 'PENDING')
                            <span class="badge bg-warning text-uppercase">Pending</span>
                            @elseif ($row->status == 'SETTLEMENT')
                            <span class="badge bg-info text-uppercase">Settlement</span>
                            @else
                            <span class="badge bg-success text-uppercase">Success</span>
                            @endif
                        </td>
                        <td>{{ $row->phone }}</td>
                        <td>Rp. {{ number_format($row->total_price) }}</td>
                        <td>
                            @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin.my-transaction.detail', [$row->slug, $row->id]) }}" class="btn btn-primary">
                                <i class="bi bi-eye"></i> Detail</a>
                            @else
                            <a href="{{ route('user.my-transaction.detail', [$row->slug, $row->id]) }}" class="btn btn-primary">
                                <i class="bi bi-eye"></i> Detail</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No enteries found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection