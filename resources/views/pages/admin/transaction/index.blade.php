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

    <div class="section dashboard">
        <div class="row">
            <!-- Sales Card -->
            <div class="col-md-3">
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
            <div class="col-md-3">
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
            <div class="col-md-3">
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
            <div class="col-md-3">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Success</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $success }}</h6>
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
                            @else
                            <span class="badge bg-success text-uppercase">Success</span>
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
                            <!-- Basic Modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $row->id }}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                            <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $row->name }} - {{ $row->phone }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.transaction.update', $row->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label">Select Status</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example" name="status">
                                                            <option selected>Open this select menu</option>
                                                            <option value="PENDING">Pending</option>
                                                            <option value="SETTLEMENT">Settlement</option>
                                                            <option value="EXPIRED">Expired</option>
                                                            <option value="SUCCESS">Success</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- End Basic Modal-->
                            <a href="{{ route('admin.my-transaction.detail', [$row->slug, $row->id]) }}" class="btn btn-primary">
                            <i class="bi bi-eye"></i> Detail</a>
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