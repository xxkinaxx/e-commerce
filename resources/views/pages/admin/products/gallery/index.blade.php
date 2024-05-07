@extends('layouts.parent')
@section('title', 'Product Gallery')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title"></h1>

        <div class="pagetitle">
            <h1>Product Gallery >> {{$product->name}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="breadcrumb-item active">Data Product . Gallery</li>
                </ol>
            </nav>
            <!-- Basic Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        <i class="bi bi-plus"></i>Add Image
                    </button>
                    @include('pages.admin.products.gallery.modal-create')

        </div><!-- End Breadcrumbs with a page title -->

    </div>
</div>

<div class="card">
    <table class="table datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>img</td>
                <th>owo</th>
            </tr>
        </tbody>
    </table>
</div>
@endsection