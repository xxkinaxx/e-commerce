@extends('layouts.parent')
@section('title', 'Create Product')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create product</h5>

        <!-- Vertical Form -->
        <form class="row g-3" action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-12">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="name">
            </div>
            <label class="form-label">Select</label>
                <div>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option selected>Choose Category</option>
                        @foreach ($category as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="col-12">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="productPrice" name="price">
            </div>
            <div class="mb-3">
                <label for="productDesc" class="form-label">Product Description</label>
                <textarea id="editor" name="description" class="col-10"></textarea>
            </div>
            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        console.log(editor);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>
@endsection