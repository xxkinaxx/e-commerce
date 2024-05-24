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
                            <span class="badge bg-success text-uppercase">Settlement</span>
                            @endif
                        </td>
                        <td>{{ $row->phone }}</td>
                        <td>Rp. {{ number_format($row->total_price) }}</td>
                        <td>
                            @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin.my-transaction.detail', [$row->slug, $row->id]) }}" class="btn btn-primary">Detail</a>
                            @else
                            <a href="{{ route('user.my-transaction.detail', [$row->slug, $row->id]) }}" class="btn btn-primary">Detail</a>
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