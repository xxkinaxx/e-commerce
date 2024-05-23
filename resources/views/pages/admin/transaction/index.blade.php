@extends('layouts.parent')
@section('title', 'Transaction')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"></h1>

            <div class="pagetitle">
                <h1>Transaction</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" class="active">Transaction</li>
                        <li class="breadcrumb-item">My Transaction</li>
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
                        <td>Payment Url</td>
                        <td>Total Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaction as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                            @if ($row->status == 'EXPIRED')
                            <span class="badge bg-danger text-uppercase">Expired</span>
                            @elseif ($row->status == 'PENDING')
                            <span class="badge bg-warning text-uppercase">Pending</span>
                            @elseif ($row->status == 'SETTLEMENT')
                            <span class="badge bg-success text-uppercase">Settlement</span>
                            @endif
                        </td>
                        <td>
                            @if ($row->payment_url == NULL)
                                <span>NULL</span>
                            @else
                            <a href="{{ $row->payment_url }}">Click here</a>
                            @endif
                        </td>
                        <td>Rp. {{ number_format($row->total_price) }}</td>
                        <td>
                            <!-- Vertically centered Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{$row->id}}">
                                Detail
                            </button>
                            <div class="modal fade" id="detailModal{{$row->id}}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Transaction Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Transaction id : {{ $row->id }}</p>
                                            <p>Reciever Name : {{ $row->name }}</p>
                                            <p>Email : {{ $row->email }}</p>
                                            <p>Phone : {{ $row->phone }}</p>
                                            <p>Address : {{ $row->address }}</p>
                                            <p>Payment : {{ $row->payment }}</p>
                                            <p>Payment Url : <a href="{{ $row->payment_url }}">Click here</a></p>
                                            <p>Status : {{ $row->status }}</p>
                                            <p>Total Price : Rp. {{ number_format($row->total_price) }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
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