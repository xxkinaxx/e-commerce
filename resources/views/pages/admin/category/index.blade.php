@extends('layouts.parent')

@section('title', 'Category')

@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="card-title"></h1>

        <div class="pagetitle">
            <h1>Category</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Category</li>
                    <li class="breadcrumb-item">Data Product</li>
                </ol>
            </nav>

            <!-- button modal create category -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModalCategory">
                <i class="bi bi-plus-lg"></i>
                Add Category
            </button>
            @include('pages.admin.category.modal-create')

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
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($category as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <img src="{{ url('storage/category', $row->image) }}" alt="{{ $row->name }}" class="w-100">
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#editModalCategory{{ $row->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    @include('pages.admin.category.modal-edit')
                                    <form action="{{ route('admin.category.destroy', $row->id) }}" method="post" class="d-inline">
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

@push('script')
<script src="text/javascript">
    ;

    (function($) {
        function readURL(input) {
            var $prev = $('#preview-logo')
        }
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $prev.attr('src', e.target.result)
            }

            reader.readAsDataURL(input.files[0]);
            $prev.attr('class', '')

        } else {
            $prev.attr('class', 'visually-hidden')
        }

        $('#categoryImage').on('change', function() {
            readURL(this);
        })
    }) (jQuery);
</script>
@endpush