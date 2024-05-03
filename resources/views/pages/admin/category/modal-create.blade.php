<div class="modal fade" id="createModalCategory" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-12">
                            <label for="categoryImage" class="form-label">Category Image</label>
                            <input type="file" class="form-control" id="categoryImage" name="image">
                        </div>
                    </div>
                    <img src="#" alt="" id="preview-logo" class="visually-hidden img-thumbnail">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Basic Modal-->