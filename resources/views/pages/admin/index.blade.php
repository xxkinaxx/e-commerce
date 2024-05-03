@extends('layouts.parent')
@section('title', 'Dashboard - Admin')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"></h1>

            <div class="pagetitle">
            <h1>Welcome {{ Auth::user()->name }}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a></li>
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item">Data Product</li>
                    </ol>
                </nav>
            </div><!-- End Breadcrumbs with a page title -->

        </div>
    </div>
</div>
@endsection