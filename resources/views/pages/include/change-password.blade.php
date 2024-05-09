@extends('layouts.parent')
@section('title', 'change password')
@section('content')
<div class="row">
    <div class="card p-4">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Change Your Account Password</h5>
                <p class="text-center small">Enter your current password & new password</p>
            </div>

            <form method="post" action="{{route('profile.update-password')}}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Current Paswword</label>
                <div class="col-sm-10">
                    <input type="password" placeholder="password sekarang" name="current_password" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" placeholder="password baru" name="password" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" placeholder="password baru" name="confirmation_password" class="form-control">
                </div>
            </div>
            <button type="submit"  class="btn btn-primary mt-2 w-100">
                Change Password
            </button>

        </form>

        </div>

    </div>
</div>
</div>
@endsection