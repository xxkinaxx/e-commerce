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
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i></a>

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
            @forelse ($gallery as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ url('storage/product/gallery', $row->image) }}" alt="" class="img-thumbnail" width="100">
                </td>
                <td>
                    <form action="{{ route('admin.product.gallery.destroy', [$product->id, $row->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="3">No Enteries yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection