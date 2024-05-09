<div class="modal fade" id="confirmReset{{$row->id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password "{{ $row->name }}"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.resetPassword', $row->id) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <h2 class="text-center font-bold">Are you sure to reset {{ $row->name }}'s Password?</h2>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-primary">Changes Password</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Basic Modal-->
