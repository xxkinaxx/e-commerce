@extends('layouts.parent')
@section('title', 'Product')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title"></h1>

        <div class="pagetitle">
            <h1>Category</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Category</li>
                    <li class="breadcrumb-item active">Data Product</li>
                </ol>
            </nav>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i>
                Create Product</a>

        </div><!-- End Breadcrumbs with a page title -->

    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->category->name }}</td>
                                <td>{{ Str::limit(strip_tags($row->description)) }}</td>
                                <td>{{ $row->price }}</td>
                                <td>
                                    <a href="{{ route('admin.product.gallery.index', $row->id) }}" class="btn btn-primary">
                                        <i class="bi bi-card-image"></i>
                                    </a>
                                    <a href="{{ route('admin.product.edit', $row->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('admin.product.destroy', $row->id) }}" method="post" class="d-inline">
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
                                <td colspan="4" class="text-center">No enteries found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection