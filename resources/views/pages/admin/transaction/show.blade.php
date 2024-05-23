@extends('layouts.parent')
@section('title', 'Detail Transaction')

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
            <div class="card-title"><i class="bi bi-cart"></i> Detail Transaction</div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name Account</td>
                        <td>Product</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactionItem as $row)
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->product->name }}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection