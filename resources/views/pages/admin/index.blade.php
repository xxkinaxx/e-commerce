@extends('layouts.parent')
@section('title', 'Dashboard - Admin')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Welcome {{ Auth::user()->name }}</h1>

            <div class="pagetitle">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Components</li>
                        <li class="breadcrumb-item active">Breadcrumbs</li>
                    </ol>
                </nav>
            </div><!-- End Breadcrumbs with a page title -->

        </div>
    </div>
</div>
@endsection