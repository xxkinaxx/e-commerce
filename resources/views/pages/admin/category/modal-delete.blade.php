<div class="modal fade" id="deleteModalCategory" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.category.destroy, $row->id ) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <h1 class="text-center">Are you sure you want to delete this category?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-primary">Delete Category</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Basic Modal-->